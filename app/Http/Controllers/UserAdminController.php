<?php

namespace App\Http\Controllers;



use App\Role;
use App\Role_user;
use App\User;

use \Exception;
use \Redirect;
use \Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserAdminController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $req) {
        $users = User::where('active','=', true)->orderBy('name')->paginate(20);



        if(!empty($req->searchName)){
            $users = $users->where('name', 'like', '%'.$req->searchName.'%');
        }

        return view('auth.admin.admin')
            ->with('users', $users)
            ->with('req', $req);
    }

    public function add(Request $req) {
        $roles = Role::get();

        return view('auth.admin.user')
            ->with('roles', $roles)
            ->with('req', $req)
            ->with('update', false);
    }

    public function create(Request $req)
    {
        try {

            $validator = Validator::make($req->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'roles' => 'required'
            ]);

            if ($validator->fails()) {
                return Redirect::to('user/add')
                    ->withInput()
                   ->withErrors($validator->messages()) ;
            }

            $user = new User;
            $user->name = $req->name;
            $user->email      = $req->email;
            $user->password   =  bcrypt($req->password);
            $user->save();

            if (count($req->roles)) {
                foreach ($req->roles as $rol) {
                    $user->attachRole($rol);
                }
            }

            return Redirect::to('/admin');


        } catch (Exception $e) {
            //echo $e->getMessage();
        }
    }

    public function edit(Request $req, $id) {
        try {
            $user = User::findOrFail($id);
            $roles = Role::get();
            $userRole = Role_user::where('user_id', '=', $user->id)->lists('role_id')->toArray();

            return view('auth.admin.user')
                ->with('roles', $roles)
                ->with('user', $user)
                ->with('userRole', $userRole)
                ->with('update', true);

        }catch (Exception $e) {
            return Redirect::to('/admin');
        }
    }

    public function update(Request $req, $id) {
        try {
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
                return Redirect::to('user/edit/'.$user->id)
                    ->withInput()
                    ->withErrors($validator->messages()) ;
            }

            $user->name = $req->name;
            $user->email = $req->email;
            if ($req->reset) $user->password = bcrypt($req->password);

            $user->save();

            if (count($req->roles)) {
                foreach ($req->roles as $rol) {
                    $user->attachRole($rol);
                }
                Role_user::where('user_id', '=', $user->id)->whereNotIn('role_id', $req->roles)->delete();
            }

            return Redirect::to('/admin');

        } catch (Exception $e) {
            return Redirect::to('/admin');
        }
    }

    public function delete(Request $req, $id) {
        try {
            $user = User::findOrFail($id);
            $user->active = false;
            $user->save();
            //User::destroy($id);

        } catch (Exception $e) {

        }
        return Redirect::to('/admin');
    }

}
