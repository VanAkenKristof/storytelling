<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $race_id
 * @property integer $class_id
 * @property integer $sub_class_id
 * @property integer $background_id
 * @property string $name
 * @property integer $age
 * @property string $story
 */

class Story extends Model
{
    protected $table = "stories";

    public function background()
    {
        return $this->belongsTo(Background::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function subClass()
    {
        return $this->belongsTo(SubClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
