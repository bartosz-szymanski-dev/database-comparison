<?php

namespace App\Service\Home\Button\MySQL;

use App\Model\Home\Button;
use App\Service\Home\Button\AbstractButtonBuilder;

class GetAllButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Odczytaj dane')
            ->setUrl($this->urlGenerator->generate('front.mysql.get_all'))
            ->setColorClassName('btn-success');
    }
}
