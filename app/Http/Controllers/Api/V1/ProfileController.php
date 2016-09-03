<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Transformers\UserTransformer;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    use Helpers;

    public function index(){
        $user = $this->auth()->user();//app('Dingo\Api\Auth\Auth')->user();
        return $this->response->item($user, new UserTransformer());

    }
}
