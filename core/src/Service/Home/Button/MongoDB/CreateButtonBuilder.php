<?php

namespace App\Service\Home\Button\MongoDB;

use App\Model\Home\Button;
use App\Service\Home\Button\AbstractButtonBuilder;

class CreateButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Stwórz dane')
            ->setUrl($this->urlGenerator->generate('front.mongo_db.create'));
    }
}
