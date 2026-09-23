<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->render('home/index', [
            'title'       => t('meta.homeTitle'),
            'description' => t('meta.homeDesc'),
        ]);
    }
}
