<?php

namespace App\Repositories;


use App\ClassModel;

class ClassRepository
{
    public function getAll()
    {
        return ClassModel::all();
    }
}