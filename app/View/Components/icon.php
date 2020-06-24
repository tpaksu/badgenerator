<?php

namespace App\View\Components;

use Illuminate\View\Component;

class icon extends Component
{
    public $path;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $path, string $class)
    {
        $this->path = $path;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.icon', ["contents" => $this->getContent()]);
    }

    protected function getContent()
    {
        $this->path = trim($this->path);
        if (!empty($this->path)) {
            $path = rtrim(public_path(), "/") . "/" . ltrim($this->path, "/");
            if (file_exists($path)) {
                return $this->applyClass(file_get_contents($path)) ?? "";
            }
        }
        return "";
    }

    protected function applyClass($content)
    {
        return str_replace("<svg ", "<svg class='" . $this->class . "' ", $content);
    }
}
