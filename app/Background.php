<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 */

class Background extends Model
{
    use SoftDeletes;

    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
