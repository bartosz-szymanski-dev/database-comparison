<?php

namespace App\Model\Home;

use App\Model\AbstractModel;

class Button extends AbstractModel
{
    private const BTN_PRIMARY_COLOR_CLASS_NAME = 'btn-primary';

    public function setText(string $text): self
    {
        $this->data['text'] = $text;

        return $this;
    }

    public function getText(): string
    {
        return $this->data['text'] ?? '';
    }

    public function setUrl(string $url): self
    {
        $this->data['url'] = $url;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->data['url'] ?? '';
    }

    public function setColorClassName(string $colorClassName): self
    {
        $this->data['colorClassName'] = $colorClassName;

        return $this;
    }

    public function getColorClassName(): string
    {
        return $this->data['colorClassName'] ?? self::BTN_PRIMARY_COLOR_CLASS_NAME;
    }
}
