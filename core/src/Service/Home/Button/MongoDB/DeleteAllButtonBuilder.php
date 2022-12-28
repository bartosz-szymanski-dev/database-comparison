<?php

namespace App\Service\Home\Button\MongoDB;

use App\Model\Home\Button;
use App\Model\Home\ButtonMethod;
use App\Service\Home\Button\AbstractButtonBuilder;

class DeleteAllButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Usuń wszystkie dane')
            ->setUrl($this->urlGenerator->generate('front.mongo_db.delete_all'))
            ->setColorClassName('btn-warning')
            ->setMethod(ButtonMethod::DELETE);
    }
}
