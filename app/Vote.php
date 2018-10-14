<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $story_id
 * @property integer $user_id
 */

class Vote extends Model
{

    public function story()
    {
        return $this->belongsToMany(Story::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
