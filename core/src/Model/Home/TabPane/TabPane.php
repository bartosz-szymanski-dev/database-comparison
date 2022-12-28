<?php

namespace App\Model\Home\TabPane;

use App\Model\AbstractModel;
use App\Model\Home\Button;

class TabPane extends AbstractModel
{
    public function setId(string $id): self
    {
        $this->data['id'] = $id;

        return $this;
    }

    public function getId(): string
    {
        return $this->data['id'] ?? '';
    }

    public function setTarget(string $target): self
    {
        $this->data['target'] = $target;

        return $this;
    }

    public function getTarget(): string
    {
        return $this->data['target'] ?? '';
    }

    public function setName(string $name): self
    {
        $this->data['name'] = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->data['name'] ?? '';
    }

    public function addButton(Button $button): self
    {
        $this->data['buttons'][] = $button;

        return $this;
    }

    public function getButtons(): array
    {
        return $this->data['buttons'] ?? [];
    }
}
