<?php

return [
    "github.com" => [
        "format" => "^https?://(www\.)?github\.com/(?<username>[a-zA-Z0-9._-]+)/(?<repository>[a-zA-Z0-9._-]+)/?$",
        "badges" => [
            "packagistVersion" => [
                "title" => "Packagist Version",
                "badge" => "https://poser.pugx.org/[username]/[repository]/v",
                "link" => "//packagist.org/packages/[username]/[repository]",
                "text" => "Latest Stable Version"
            ],
            "packagistDownloads" => [
                "title" => "Packagist Downloads",
                "badge" => "https://poser.pugx.org/[username]/[repository]/downloads",
                "link" => "//packagist.org/packages/[username]/[repository]",
                "text" => "Total Downloads"
            ]
        ]
    ]
];
