<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 */

class Race extends Model
{
    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
