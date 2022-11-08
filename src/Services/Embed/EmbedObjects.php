<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

use Illuminate\Support\Collection;

abstract class EmbedObjects
{
    protected const LIMITS = [
        'title' => 256,
        'description' => 4096,
        'fields' => 25,
        'field' => [
            'name' => 256,
            'value' => 1024,
        ],
        'footer' => [
            'text' => 2048,
        ],
        'author' => [
            'name' => 256,
        ]
    ];

    protected Collection $data;

    public function __construct()
    {
        $this->data = collect();
    }

    /**
     * @return Collection
     */
    public function getData(): Collection
    {
        return $this->data;
    }
}
