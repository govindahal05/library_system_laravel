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

/*	logout	*/
Route::get('/logout','UserController@logout');

/* admindash */

Route::get('adminpanel',['as'=>'adminp','uses'=>'UserController@gotoadmin']);


/* memberdash */
Route::get('memberpanel',function(){
	return View::make('members/memberDashboard');
});
/*Route::get('memberpanel',['as'=>'memberp','uses'=>'UserController@gotomember']);
*/

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

// Route::get('displaybook', function(){
// 	return View::make('members/view_book');
// });