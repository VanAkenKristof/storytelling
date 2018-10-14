<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 */

class ClassModel extends Model
{
    protected $table = 'classes';

    public function subClasses()
    {
        return $this->hasMany(SubClass::class);
    }
}
