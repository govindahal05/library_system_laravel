<?php

class AuthController extends BaseController
{
    public function index()
    {
        return View::make('register');
    }

    public function register()
    {
        $name = \Input::get('name');
        $address = \Input::get('address');
        $phone = \Input::get('phone');
        $email = \Input::get('email');
        $gender = \Input::get('gender');
        $username = \Input::get('username');
        $password = \Input::get('password');

        $validator = Validator::make([
                'username' => $username,
                'password' => $password,
            ],
            [
            'username' => 'unique:users,username',
            'password' => 'min:4',
        ]);

        if ($validator->fails()) {
            return $validator->withmessages('Register filed');
        }

        else{
            User::create([
                'name' => $name,
                'address' => Hash::make($password),
                'phone' => $phone,
                'email' => $email,
                'gender' => $gender,
                'username' => $username,
                'password' => Hash::make($password)
            ]);

            return View::make('register');
        }
    }

    public function showLogin()
    {
        return View::make('frontend');
    }

    public function login()
    {
        $username = \Input::get('username');
        $password = \Input::get('password');


        $user_authentication = Auth::attempt([
            'username' => $username,
            'password' => $password
        ]);

        if ($user_authentication){
            if($username=='admin'){
                return Redirect::Route('admin');
            }
            else{
                return Redirect::Route('member');
            }
        }
        else{
            return "Unauthorized access";
        }
    }

    public function gotoadmin()
    {
        return View::make('admin/admin_dashboard');
    }
    public function gotomember()
    {
        return View::make('members/member_dashboard');
    }
} 