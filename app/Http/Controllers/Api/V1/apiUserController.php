<?php namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Response;
use Auth;
use \Validator;
use \Exception;
use Dingo\Api\Routing\Helpers;

class apiUserController extends Controller
{
    use Helpers;

    public function index(Request $req) {

        if($this->auth()->user()->is('api')) {
            $user = User::where('active','=',true)->paginate(20);
            return Response::json($user, 200)->setCallback($req->input('callback'));
        } else {
            return Response::json('{"message": "Unauthorized","status_code": 401}', 401)->setCallback($req->input('callback'));
        }
    }

    public function logout(){
        Auth::logout();
        return Response::json('LOGOUT',200);
    }

    public function create(Request $req)
    {
        try {
            if($this->auth()->user()->is('admin')) {

                $validator = Validator::make($req->all(), [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6',
                    'roles' => 'required|array'
                ]);

                if ($validator->fails()) {
                    return Response::json($validator->messages(), 400)->setCallback($req->input('callback'));
                }

                $user = new User;
                $user->name = $req->name;
                $user->email = $req->email;
                $user->password = bcrypt($req->password);
                $user->save();

                if (count($req->roles)) {
                    foreach ($req->roles as $rol) {
                        $user->attachRole($rol);
                    }
                }
                return Response::json($user, 200)->setCallback($req->input('callback'));
            } else {
                return Response::json('{"message": "Unauthorized","status_code": 401}', 401)->setCallback($req->input('callback'));
            }

        } catch (Exception $e) {
            return Response::json($e->getMessage(), 500)->setCallback($req->input('callback'));
        }
    }

    public function getUser(Request $req, $id) {
        try {
            if($this->auth()->user()->is('admin')) {
                $user = User::findOrFail($id);
                return Response::json($user, 200)->setCallback($req->input('callback'));
            } else {
                return Response::json('{"message": "Unauthorized","status_code": 401}', 401)->setCallback($req->input('callback'));
            }
        }catch (\Exception $e) {
            return Response::json('{"message": "User not found","status_code": 404}', 404)->setCallback($req->input('callback'));
        }
    }

    public function update(Request $req, $id) {
        try {
            if($this->auth()->user()->is('admin')) {
                $user = User::findOrFail($id);

                $rules = [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users,email,'.$user->id,
                    'roles' => 'required'
                ];

                if ($req->reset)
                    $rules['password']= 'required|min:6|confirmed';

                $validator = Validator::make($req->all(), $rules);

                if ($validator->fails()) {
                    return Response::json($validator->messages(), 400)->setCallback($req->input('callback'));
                }

                $user->name = $req->name;
                $user->email = $req->email;
                if ($req->reset) $user->password = bcrypt($req->password);

                $user->save();
                /*if (count($req->roles)) {
                    foreach ($req->roles as $rol) {
                        $user->attachRole($rol);
                    }
                    Role_user::where('user_id', '=', $user->id)->whereNotIn('role_id', $req->roles)->delete();
                }*/
                return Response::json($user, 200)->setCallback($req->input('callback'));

            } else {
                return Response::json('{"message": "Unauthorized","status_code": 401}', 401)->setCallback($req->input('callback'));
            }
        } catch (Exception $e) {
            return Response::json('{"message": "User not found","status_code": 404}', 404)->setCallback($req->input('callback'));
        }
    }

    public function delete(Request $req, $id) {
        try {
            if($this->auth()->user()->is('admin')) {
                $user = User::findOrFail($id);
                $user->active = false;
                $user->save();
                //User::destroy($id);
                return Response::json($user, 200)->setCallback($req->input('callback'));
            } else {
                return Response::json('{"message": "Unauthorized","status_code": 401}', 401)->setCallback($req->input('callback'));
            }

        } catch (Exception $e) {
            return Response::json('{"message": "User not found","status_code": 404}', 404)->setCallback($req->input('callback'));
        }
    }
}