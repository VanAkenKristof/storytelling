<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 */

class Race extends Model
{
    use SoftDeletes;

    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
