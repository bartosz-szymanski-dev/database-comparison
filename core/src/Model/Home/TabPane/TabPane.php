<?php

namespace App\Model\Home\TabPane;

class TabPane
{
    private array $data = [];

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
}
