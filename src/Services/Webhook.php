<?php

namespace Dragan\DiscordWebhooks\Services;

use Illuminate\Support\Collection;

class Webhook
{
    private Collection $collection;
    private string $webhook;

    public function __construct()
    {
        $this->webhook = config('discord-webhooks.default_channel');
    }

    public function channel(string $channel): static
    {
        $this->webhook = config('discord-webhooks.channels.' .$channel );

        return $this;
    }

    public function webhook(string $webhook): static
    {
        $this->webhook = $webhook;

        return $this;
    }


    public function send()
    {

    }
}
