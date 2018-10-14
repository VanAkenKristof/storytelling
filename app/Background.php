<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 */

class Background extends Model
{
    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
