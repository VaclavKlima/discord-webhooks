<?php

namespace Dragan\DiscordWebhooks\Services;

use Dragan\DiscordWebhooks\Exceptions\DiscordWebhookResponseException;
use Dragan\DiscordWebhooks\Exceptions\DiscordWebhookValidationException;
use http\Client\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Webhook
{
    private Collection $data;
    private string $webhook;

    public function __construct()
    {
        $this->webhook = config('discord-webhooks.default_channel');
        $this->data = collect();
        $this->data->put('embeds', []);
        $this->data->put('files', []);
        $this->data->put('attachments', []);
    }

    public function channel(string $channel): static
    {
        $this->webhook = config('discord-webhooks.channels.'.$channel);

        return $this;
    }

    public function webhook(string $webhook): static
    {
        $this->webhook = $webhook;

        return $this;
    }

    /**
     * @throws DiscordWebhookValidationException
     */
    public function message(string $message): static
    {
        if (Str::length($message) > 2000) {
            throw new DiscordWebhookValidationException('Message exceeded 2000 characters length.');
        }

        $this->data->put('content', $message);

        return $this;
    }

    public function username(string $username): static
    {
        $this->data->put('username', $username);

        return $this;
    }

    public function avatar(string $avatarUrl): static
    {
        $this->data->put('avatar_url', $avatarUrl);

        return $this;
    }

    public function textToSpeach(bool $enable = true): static
    {
        $this->data->put('tts', $enable);

        return $this;
    }

    /**
     * Name of thread to create (requires the webhook channel to be a forum channel)
     * @param string $name
     * @return void
     */
    public function threadName(string $name): static
    {
        $this->data->put('thread_name', $name);

        return $this;
    }

    // Todo: attachments

    /** Todo: add max embeds count */
    public function addEmbed(Embed $embed): static
    {
        $embeds = $this->data->get('embeds');
        $embeds[] = $embed->getData();
        $this->data->put('embeds', $embeds);

        return $this;
    }

    public function addAttachment(string $filePath, ?string $description = null): static
    {
        $files = $this->data->get('files');
        $attachments = $this->data->get('attachments');
        $id = count($files);
        $filename = array_slice(explode('\\', $filePath), -1)[0];
        $attachments[] = [
            'id' => $id,
            'description' => $description ?? $filename,
            'filename' => $filename,
        ];
        $files[$id] = [
            'file' => file_get_contents($filePath),
            'filename' => $filename,
        ];

        $this->data->put('attachments', $attachments);
        $this->data->put('files', $files);

        return $this;
    }


    public function raw(array|Collection $data): static
    {
        $this->data = $data instanceof Collection ? $data : collect($data);

        return $this;
    }


    /**
     * @throws DiscordWebhookResponseException
     */
    public function send(): Response
    {
        $request = Http::beforeSending(function ($request) {

        });

//        foreach ($this->data->get('files') as $key => $file) {
//            $request->attach("files[{$key}]",$file['file'], $file['filename']);
//        }
//
//        $this->data->put('files', []);

        $response = $request->send('post',$this->webhook, $this->parseData());

        if (!$response->successful()) {
            throw new DiscordWebhookResponseException("Discord responded with status: {$response->status()}, Reason: {$response->reason()}", $response->status());
        }

        return $response;
    }

    private function parseData(): array
    {
        return $this->data->toArray();
    }
}
