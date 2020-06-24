<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class RepositoryInput extends Component
{
    public $valid;

    public $query;

    public $badges;

    public function mounted()
    {
        $this->valid = false;
    }

    public function render()
    {
        $this->valid = $this->validateQuery();
        $badges = $this->valid ? $this->getBadges() : [];
        return view('livewire.repository-input', ["badges" => $badges]);
    }

    protected function validateQuery()
    {
        $this->query = trim($this->query);
        $parts = parse_url($this->query);
        if ($parts && is_array($parts)) {
            return $this->repositoryExists($parts);
        }
        return false;
    }

    protected function repositoryExists(array $parts)
    {
        $validDomains = collect(config("badgenerator"))->keys();
        $validSchemes = ["https", "http"];

        if (
            !isset($parts["host"]) ||
            empty($parts["host"]) ||
            $validDomains->contains(str_replace("www.", "", $parts["host"])) == false
        ) {
            return false;
        }

        if (
            !isset($parts["scheme"]) ||
            empty($parts["scheme"]) ||
            !in_array($parts["scheme"], $validSchemes)
        ) {
            return false;
        }

        if (
            !isset($parts["path"]) ||
            empty($parts["path"]) ||
            substr_count(rtrim($parts["path"], "/"), "/", 1) !== 1
        ) {
            return false;
        }

        $client = new Client();

        try {
            $client->head($this->query);
            return true;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return false;
        }
    }

    protected function getBadges()
    {
        $this->badges = [];

        $parts = parse_url($this->query);
        $parts["host"] = str_replace("www.", "", $parts["host"]);
        $host = $parts["host"];
        $config = config("badgenerator", []);

        if (empty($config) || !isset($config[$host])) {

            return;
        }

        $config = $config[$host];
        $format = "/" . str_replace("/", "\\/", trim($config["format"], "/ ")) . "/";

        preg_match($format, $this->query, $matches);

        list($username, $repository) = [$matches["username"], $matches["repository"]];

        foreach ($config["badges"] as $badge) {
            $title = $badge["title"];
            $linkUrl = str_replace("[repository]", $repository, str_replace("[username]", $username, $badge["link"]));
            $imageUrl = str_replace("[repository]", $repository, str_replace("[username]", $username, $badge["badge"]));
            $text = $badge["text"];
            $markdown = "[![$text]($imageUrl)]($linkUrl)";

            $this->badges[] = [
                "title" => $title,
                "linkUrl" => $linkUrl,
                "imageUrl" => $imageUrl,
                "text" => $text,
                "markdown" => $markdown,
            ];
        }
    }
}
