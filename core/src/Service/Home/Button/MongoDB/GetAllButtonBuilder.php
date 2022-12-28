<?php

namespace App\Service\Home\Button\MongoDB;

use App\Model\Home\Button;
use App\Model\Home\ButtonMethod;
use App\Service\Home\Button\AbstractButtonBuilder;

class GetAllButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Odczytaj dane')
            ->setUrl($this->urlGenerator->generate('front.mongo_db.get_all'))
            ->setColorClassName('btn-success')
            ->setMethod(ButtonMethod::GET);
    }
}
