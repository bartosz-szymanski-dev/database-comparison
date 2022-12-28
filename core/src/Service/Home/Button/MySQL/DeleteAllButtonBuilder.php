<?php

namespace App\Service\Home\Button\MySQL;

use App\Model\Home\Button;
use App\Service\Home\Button\AbstractButtonBuilder;

class DeleteAllButtonBuilder extends AbstractButtonBuilder
{
    public function create(): Button
    {
        return (new Button())
            ->setText('Usuń wszystkie dane')
            ->setUrl($this->urlGenerator->generate('front.mysql.delete_all'))
            ->setColorClassName('btn-warning');
    }
}
