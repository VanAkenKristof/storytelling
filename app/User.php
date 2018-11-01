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
 * @property string $ban_message
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

    public function story()
    {
        return $this->hasOne(Story::class);
    }

    public function votes()
    {
        return $this->belongsToMany(Story::class, 'votes');
    }

    public function fullAddress()
    {
        return $this->street . " " . $this->number . " | " . $this->postal_code . " " . $this->city . " " . $this->country;
    }
}
