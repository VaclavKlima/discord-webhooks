<?php

namespace Dragan\DiscordWebhooks\Services;

use Dragan\DiscordWebhooks\Services\Embed\EmbedObjects;
use Dragan\DiscordWebhooks\Services\Embed\Footer;
use Dragan\DiscordWebhooks\Services\Embed\Image;
use Dragan\DiscordWebhooks\Services\Embed\Thumbnail;
use Dragan\DiscordWebhooks\Services\Embed\Video;
use Illuminate\Support\Carbon;

class Embed extends EmbedObjects
{
    public function __construct()
    {
        parent::__construct();
        $this->data->put('type', 'rich'); // always "rich" for webhook embeds
        $this->data->put('color', 0x006eff);
    }

    public function title(string $string): static
    {
        $this->data->put('title', $string);

        return $this;
    }

    public function description(string $description): static
    {
        $this->data->put('description', $description);

        return $this;
    }

    public function url(string $url): static
    {
        $this->data->put('url', $url);

        return $this;
    }

    public function timestamp(Carbon|string $timestamp): static
    {
        $timestampString = is_string($timestamp) ? Carbon::parse($timestamp)->toIso8601String() : $timestamp->toIso8601String();
        $this->data->put('timestamp', $timestampString);

        return $this;
    }

    /**
     * Must be color code
     * Example: 0x8a009f
     */
    public function color(int $color): static
    {
        $this->data->put('color', $color);

        return $this;
    }

    /**
     * Embed objects
     *
     */
    public function footer(Footer $footer): static
    {
        $this->data->put('footer', $footer->getData());

        return $this;
    }

    public function image(Image $image): static
    {
        $this->data->put('image', $image->getData());

        return $this;
    }

    public function thumbnail(Thumbnail $thumbnail): static
    {
        $this->data->put('thumbnail', $thumbnail->getData());

        return $this;
    }

    public function video(Video $video): static
    {
        $this->data->put('video', $video->getData());

        return $this;
    }
}
