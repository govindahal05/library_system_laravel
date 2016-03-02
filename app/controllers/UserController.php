<?php

// use Repositories/UserRepository;

class UserController extends BaseController {
	/**
	 * @param Validator $validator
	 * @param User $user
	 * @param Request $request
	 * @param Authentication $authenticator
	 */
	public function __construct(UserRepository $user, CustomValidator $validator, Request $request, Authentication $authenticator) {
		$this->user = $user;
		$this->validator = $validator;
		$this->request = $request;
		$this->authenticator = $authenticator;
	}
	public function registerUser() {
		$data = $input = Input::all();
		$rules = array(
			'email' => 'unique:users,email',
			'username' => 'unique:users',
			'password' => 'min:4|max:10',
		);
		$validation = $this->validator->validate($data, $rules);
		if ($validation === true) {
			$user = $this->user->addUpdate($data);
			// Mail::send('mailbody', array('users' => $data), function ($message) use ($email) {
			// 	$message->to($email)->subject('Welcome to Library management system');
			// });
			Session::flash('message', "Account Successfully Created");
			return Redirect::back();
		}
		return Redirect::back()->withInput()->withErrors($validation);
	}
	public function showLogin()
    {
        return View::make('frontend');
    }
	public function login() {
		$data = Input::all();
		$rules = array('username' => $data['username'],
			'password' => $data['password']);
		$authenticate = $this->authenticator->authenticate($rules);
		if ($authenticate === true) {
			if ($data['username'] == 'admin') {
				return Redirect::route('adminpanel');
			}
			 else {
				/*$users = $this->user->getUsers($data['username']);
				foreach ($users as $usr) {
					Session::put('username', $data['username']);
					Session::put('name', $usr->name);
				}*/
					return Redirect::route('memberpanel');
				
			}
		} else {
			return Redirect::back()->with(['message' => 'Unauthorized Access']);
		}
	}
	 public function gotoadmin()
    {
        return View::make('admin/adminDashboard');
    } 
    public function gotomember()
    {
        return View::make('members/memberDashboard');
    }

 	
	public function logout() {
		Session::flush();
        return View::make('frontend');
		// return Redirect::route('login');
	}
	public function forgetPassword()
    {
        return View::make('members/forgetpassword');
    }
	
	public function forgetProcess() {
		$email = \Input::get('email');
		$rules = array('email' => 'unique:users,email');
		$authenticate = $this->validator->validate(['email' => $email], $rules);
		// dd($authenticate);
		if ($authenticate === true) {
			return Redirect::back()->with(['message' => 'Email not registered']);
		} else {
			$this->user->processForget($email);
			return Redirect::back()->with(['message' => 'Check your inbox and proceed to change password.']);
		}
	}
	public function goToReset() {
		return View::make('members/resetpassword');
	}
	public function resetProcess() {
		$data = Input::all();
		$this->user->updatePassword($data);
		return Redirect::route('login');
	}
}