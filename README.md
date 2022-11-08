# discord-webhooks
Package for sending messages via Discord webhooks

## Install via composer:

```composer require dragan/discord-webhooks ```

then add ```\Dragan\DiscordWebhooks\DiscordWebhooksServiceProvider::class``` in  ```config/app.php``` to the "providers" section.   

## Basic usage:

Sending basic messages
```php
<?php

use Dragan\DiscordWebhooks\Services\Webhook;

(new Webhook())
       ->channel('example_channel')
       ->message('This message was sent at ' . now() )
       ->username('Example webhook')
       ->avatar('https://i.imgur.com/sDbhcnb.jpg')
       ->send();

```
<img src="https://i.imgur.com/79lbUHT.png" alt="Sending basic messages" title="Sending basic messages">



## Default config:

````php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default webhook color
    |--------------------------------------------------------------------------
    |
    | This options will be used as default color for the embeds.
    | Must be valid color code.
    |
    */
    'default_webhook_color' => 0x006eff,
    /*
    |--------------------------------------------------------------------------
    | Default webhook channel
    |--------------------------------------------------------------------------
    |
    | This options will be used when no other channel is specified.
    |
    */
    "default_channel" => env('DISCORD_DEFAULT_WEBHOOK', ''),


    /*
    |--------------------------------------------------------------------------
    | Other webhook channels
    |--------------------------------------------------------------------------
    |
    | Other Discord webhook channels.
    |
    */
    "channels" => [
        'example_channel' => env('DISCORD_EXAMPLE_CHANNEL', ''),
        'second_example_channel' => "",
    ],

];

````
