<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

class Footer extends EmbedObjects
{
    public function text(string $text): static
    {
        $this->data->put('text', $text);

        return $this;
    }

    public function icon(string $iconUrl, ?string $proxyUrl = null): static
    {
        $this->data->put('icon_url', $iconUrl);

        if ($proxyUrl) {
            $this->data->put('proxy_icon_url', $proxyUrl);
        }

        return $this;
    }
}
