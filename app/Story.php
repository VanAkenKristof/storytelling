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
}
