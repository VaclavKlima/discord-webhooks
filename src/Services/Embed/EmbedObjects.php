<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

use Illuminate\Support\Collection;

abstract class EmbedObjects
{
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
