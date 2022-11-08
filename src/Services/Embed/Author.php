<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

class Author extends EmbedObjects
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

    public function iconUrl(string $iconUrl, ?string $proxyIconUrl = null): static
    {
        $this->data->put('icon_url', $iconUrl);

        if ($proxyIconUrl) {
            $this->data->put('proxy_icon_url', $proxyIconUrl);
        }

        return $this;
    }
}
