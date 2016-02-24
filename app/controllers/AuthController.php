<?php

class AuthController extends BaseController
{
    public function index()
    {
        return View::make('register');
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
            Session::put('user',$username);
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