<?php
use Illuminate\Support\Facades\Hash;
// use User;
/**
 *
 */
class UserRepository {
	/**
	 * @param User $User
	 */
	function __construct(User $user) {
		$this->user = $user;
	}
	/**
	 * @param $data
	 */
	public function addUpdate($data) {
		$this->user->name = $data['name'];
		$this->user->address = $data['address'];
		$this->user->phone = $data['phone'];
		$this->user->email = $data['email'];
		$this->user->gender = $data['gender'];
		$this->user->username = $data['username'];
		$this->user->password = Hash::make($data['password']);
		
		/*$email = $data['email'];
		\Mail::send('mailbody', array('users' => $data), function ($message) use ($email) {
			$message->to($email)->subject('Welcome to Library management system');
		});*/
		$this->user->save();
	}
	/**
	 * @param $email
	 */
}