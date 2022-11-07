# discord-webhooks
Package for sending messages via Discord webhooks

## Install via composer:

```composer require dragan/discord-webhooks ```

## Basic usage:

Sending basic messages
``` php
<?php

use Dragan\DiscordWebhooks\Services\Webhook;

(new Webhook())
       ->message('This message was sent at ' . now() . '@everyone')
       ->username('User Name')
       ->avatar('https://i.imgur.com/sDbhcnb.jpg')
       ->send();

```


## Config:

````php
<?php

return [
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
        'example_channel' => "",
        'second_example_channel' => "",
    ],
];
````
