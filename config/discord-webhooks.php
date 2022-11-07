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
        'example_channel' => env('DISCORD_EXAMPLE_CHANNEL', ''),
        'second_example_channel' => "",
    ],
];
