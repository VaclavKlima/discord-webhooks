<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

use Illuminate\Support\Collection;

class Image extends EmbedObjects
{
    public function url(string $url, ?string $proxyUrl = null): static
    {
        $this->data->put('url', $url);

        if ($proxyUrl) {
            $this->data->put('proxy_url', $proxyUrl);
        }

        return $this;
    }

    public function dimensions(?int $height = null, ?int $width = null): static
    {
        if ($height) {
            $this->data->put('height', $height);
        }

        if ($width) {
            $this->data->put('width', $width);
        }

        return $this;
    }
}
