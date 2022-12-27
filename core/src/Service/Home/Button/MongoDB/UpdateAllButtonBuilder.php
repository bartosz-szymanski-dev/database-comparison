<?php

namespace App\Service\Home\Button\MongoDB;

use App\Model\Home\Button;
use App\Service\Home\Button\AbstractButtonBuilder;

class UpdateAllButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Zaktualizuj dane')
            ->setUrl($this->urlGenerator->generate('front.mongo_db.update_all'))
            ->setColorClassName('btn-danger');
    }
}
