<?php

namespace App\Service\Home\Button\MySQL;

use App\Model\Home\Button;
use App\Service\Home\Button\AbstractButtonBuilder;

class UpdateAllButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Zaktualizuj dane')
            ->setUrl($this->urlGenerator->generate('front.mysql.update_all'))
            ->setColorClassName('btn-danger');
    }
}