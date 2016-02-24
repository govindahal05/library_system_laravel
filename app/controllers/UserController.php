<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$users = User::all();
		return View::make('users/index',['users'=>$users]);

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
                'address' =>$address,
                'phone' => $phone,
                'email' => $email,
                'gender' => $gender,
                'username' => $username,
                'password' => Hash::make($password)
            ]);
			Session::flash('message', "Book Added");
        	return Redirect::back();
            return View::make('register');
        }
    }
	Public function show($username)
	{
		$user = User::whereUsername($username)->first(); 
		//select *from users where username = USERNAME LIMIT 1
		return View::make('users/show',['users'=>$user]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function shows($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
