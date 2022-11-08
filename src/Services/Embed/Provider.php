<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

class Provider extends EmbedObjects
{
    public function name(string $name): static
    {
        $this->data->put('name', $name);

        return $this;
    }

    public function url(string $url): static
    {
        $this->data->put('url', $url);

        return $this;
    }
}
