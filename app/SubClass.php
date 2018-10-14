<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property integer $class_id
 */

class SubClass extends Model
{
    protected $table = 'sub_classes';

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
