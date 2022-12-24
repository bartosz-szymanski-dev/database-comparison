<?php

namespace App\Service\Home\Button\MongoDB;

use App\Model\Home\Button;
use App\Model\Home\TabPane\TabPane;
use App\Service\Home\Button\AbstractButtonBuilder;

class CreateButtonBuilder extends AbstractButtonBuilder
{
    public function apply(TabPane $tabPane): void
    {
        $button = (new Button())
            ->setText('Stwórz dane')
            ->setUrl($this->urlGenerator->generate('front.mongo_db.create'));
        $tabPane->addButton($button);
    }
}
