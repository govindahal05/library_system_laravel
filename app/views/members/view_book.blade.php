@extends('layouts.default_member')

@section('content')
<table border=1 width=700>
	<thead >
		<tr>
			<th>S|N</th>
			<th>Book Name</th>
			<th>ISBN No</th>
			<th>Edition</th>
			<th>Author Name</th>
			<th>Price</th>
			<th>Category</th>
		</tr>
	</thead>
	<tbody>
	 @foreach($books as $book)
		<tr>
			<td>
				<?php $i = 1; 
				echo $i ?>
			</td>
			<td>{{ $book->book_name}}</td>
			<td>{{ $book->isbn_no}}</td>
			<td>{{ $book->edition}}</td>
			<td>{{ $book->author_name}}</td>
			<td>{{ $book->price}}</td>
			<td>{{ $book->category}}</td>
						
		</tr>
		{{$i++; }}
		@foreach_end
	</tbody>
</table>
@stop