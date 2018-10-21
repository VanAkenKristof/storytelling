<?php

namespace App\Repositories;


use App\Race;

class RaceRepository
{
    public function getAll()
    {
        return Race::all();
    }
}