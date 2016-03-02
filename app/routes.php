<?php

Route::get('/', function()
{
	return View::make('frontend');
});



Route::post('admin', function()
{
	return View::make('admin/admin_dashboard');
});
Route::post('member', function()
{
	return View::make('members/member_dashboard');
});
Route::get('member', function()
{
	return View::make('members/member_dashboard');
});




/*	Register / login */
Route::get('register', function(){
	return View::make('register');
});
Route::post('register','userController@registerUser');

Route::get('/login','UserController@showLogin');
Route::post('login','UserController@login');

/*	Mailing  */
Route::get('forgetpassword', 'UserController@forgetPassword');
Route::post('forgetprocess', 'UserController@forgetProcess');

/*	logout	*/
Route::get('/logout','UserController@logout');

/* admindash */

Route::get('adminpanel',['as'=>'adminpanel','uses'=>'UserController@gotoadmin']);


/* memberdash */
Route::get('memberpanel',function(){
	return View::make('members/memberDashboard');
});
Route::get('memberpanel',['as'=>'memberpanel','uses'=>'UserController@gotomember']);


/*	Book	*/
Route::get('addbook', function(){
	return View::make('admin/addbook');
});
Route::post('addbook','BookController@addbook');

Route::get('showbook','BookController@viewbooks');
Route::get('displaybook','BookController@viewbooksbymember');

Route::get('editbook','BookController@deleteBooks');

Route::get('editbook/{bookid}', function ($bookid) {
	$books = Book::where('id', '=', $bookid)->get();
	return View::make('admin/editbooks')->with("allBooks", $books);
});

Route::get('deletebook/{bookid}', function ($bookid) {
	return App::make('BookController')->deleteBooks($bookid);
});



/*	Password change through mail send 	*/
Route::get('/forgetpassword', 'UserController@forgetPassword');
Route::post('forgetprocess', 'UserController@forgetProcess');
// Route::get('resetPassword', 'UserController@goToReset');
Route::get('changepassword/{userid}', function ($userid) {
	$users = User::where('userid', '=', $userid)->get();
	return View::make('user/resetpassword')->with("userInfo", $users);
});
Route::post('resetprocess', 'UserController@resetProcess');



/* Payable */
/*Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'IndexController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'IndexController@getPaymentStatus',
));
Route::get('paypal','IndexController@home');
*/
/*	PaypalController */
Route::get('/paypal',function(){
	return View::make('product/purchase');
});
Route::post('/pay', ['as' => 'pay', 'uses' => 'PaypalController@pay']);
Route::get('/payment_status', ['as' => 'paymentStatus', 'uses' => 'PaypalController@paymentStatus']);
Route::post('/addtocart', 'ProductsController@addToCart');
Route::get('/mycart', ['as' => 'mycart', 'uses' => 'ProductsController@myCart']);