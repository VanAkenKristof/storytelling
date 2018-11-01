<?php
/**
 * Created by PhpStorm.
 * User: Dyroth
 * Date: 01-Nov-18
 * Time: 19:09
 */

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function banUser(User $user, $message)
    {
        $user->ban_message = $message;
        $user->save();
    }

    public function unbanUser(User $user)
    {
        $user->ban_message = null;
        $user->save();
    }
}