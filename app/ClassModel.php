<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 */

class ClassModel extends Model
{
    use SoftDeletes;

    protected $table = 'classes';

    public function subClasses()
    {
        return $this->hasMany(SubClass::class, 'class_id');
    }
}
