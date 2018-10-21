<?php

namespace App\Repositories;


use App\Background;

class BackgroundRepository
{
    public function getAll()
    {
        return Background::all();
    }
}