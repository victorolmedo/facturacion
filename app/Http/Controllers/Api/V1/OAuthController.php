<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use App\Http\Controllers\Controller;

use \Auth;

class OAuthController extends Controller
{
    use Helpers;

    /**
     * Issue an acces token
     * @return mixed
     */
    public function authorizeClient(){
        return $this->response->array(Authorizer::issueAccessToken());
    }

    public function authorizePassword($username, $password)
  {
      $credentials = [
        'email'    => $username,
        'password' => $password,
      ];

      if (Auth::once($credentials)) {
          return Auth::user()->id;
      }

    return false;
    }
}
