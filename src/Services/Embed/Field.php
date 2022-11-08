<?php

namespace Dragan\DiscordWebhooks\Services\Embed;

class Field extends EmbedObjects
{
    public function name(string $name): static
    {
        $this->data->put('name', $name);

        return $this;
    }

    public function value(string $value): static
    {
        $this->data->put('value', $value);

        return $this;
    }

    public function inline(bool $inline = false): static
    {
        $this->data->put('inline', $inline);

        return $this;
    }
}
