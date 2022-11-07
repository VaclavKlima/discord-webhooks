<?php

namespace Dragan\DiscordWebhooks;

use Illuminate\Support\ServiceProvider;

class DiscordWebhooksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/discord-webhooks.php' => config_path('discord-webhooks.php', )
        ], 'discord-webhooks-config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/discord-webhooks.php', 'discord-webhooks'
        );

    }
}
