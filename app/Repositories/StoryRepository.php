<?php

namespace App\Repositories;


use App\Story;

class StoryRepository
{

    public function getAll()
    {
        return Story::all();
    }

}