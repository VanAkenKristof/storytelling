<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $name
 * @property string $street
 * @property string $number
 * @property string $postal_code
 * @property string $city
 * @property string $country
 * @property string $email
 * @property string $password
 * @property string $ip_address
 * @property boolean $admin
 */

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function stories()
    {
        return $this->belongsTo(Story::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
