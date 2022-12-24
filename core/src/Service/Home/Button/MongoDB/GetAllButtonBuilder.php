<?php

namespace App\Service\Home\Button\MongoDB;

use App\Model\Home\Button;
use App\Model\Home\TabPane\TabPane;
use App\Service\Home\Button\AbstractButtonBuilder;

class GetAllButtonBuilder extends AbstractButtonBuilder
{
    public function apply(TabPane $tabPane): void
    {
        $button = (new Button())
            ->setText('Odczytaj dane')
            ->setUrl($this->urlGenerator->generate('front.mongo_db.get_all'))
            ->setColorClassName('btn-success');
        $tabPane->addButton($button);
    }
}
