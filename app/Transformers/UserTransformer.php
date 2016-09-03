<?php
/**
 * Created by PhpStorm.
 * User: gmatteucci
 * Date: 12/04/2016
 * Time: 12:46
 */

namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'id' => $user->id,
            'email'=>$user->email,
            'name'=>$user->name,
            'create_at'=>$user->created_at,
            'update_at'=>$user->updated_at
        ];
    }
}