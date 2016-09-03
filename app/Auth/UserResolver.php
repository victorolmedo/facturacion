<?php
/**
 * Created by PhpStorm.
 * User: gmatteucci
 * Date: 12/04/2016
 * Time: 9:24
 */

namespace App\Auth;

use App\User;

class UserResolver
{
    public function resolveById($id){
        return User::findOrFail($id);
    }

}