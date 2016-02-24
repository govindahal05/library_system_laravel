<?php

class BookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 $name = \Input::get('name');
        $isbnno = \Input::get('isbnno');
        $edition = \Input::get('edition');
        $author_name = \Input::get('author_name');
        $price = \Input::get('price');
        $category = \Input::get('category');

        //return $category;
        /*$validator = Validator::make([
                'name' => $name,
                'author_name'=>$author
            ],
            [
            'name' => 'unique:users,username',
            'author' => 'min:4',
        ]);

        if ($validator->fails()) {
            return $validator->withmessages('Register filed');
        }

        else{*/
            Books::create([
                'isbn_no' =>$isbnno,
                'edition' => $edition,
                'author_name' => $author_name,
                'book_name' => $name,
                'price' => $price,
                'category' => $category,
            ]);

           Session::flash('message', "Book Added");
        		return Redirect::back();
       // }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{	
		$books = Books::get();
		//dd($books);
		$i = 1;

		 return View::make('admin.view_book')->with(['sno' => $i, 'books'=>$books]);
	}
	public function membershow()
	{	
		$books = Books::get();
		//dd($books);
		$i = 1;

		 return View::make('members.view_book')->with(['sno' => $i, 'books'=>$books]);
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
	public function addbookredirect()
	{
		
	}


}
