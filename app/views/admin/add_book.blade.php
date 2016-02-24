@extends('layouts/default_admin')

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Add Book</h3>
      </div>
	<div class="panel-body">
	@if (Session::has('message'))
         <div class="regalert">{{ Session::get('message') }}</div>
    @endif
	{{ Form::open(array('url' => 'addbook', 'class' => 'well')) }}

		<p>
			{{form::label('name','Name')}}
			{{ Form::text('name', null, array('class'=>'form-control input-sm')) }}
		</p>
		<p>
			{{form::label('isbnno','ISBN NO.')}}
			{{ Form::text('isbnno', null, array('class'=>'form-control input-sm')) }}
		</p>
		<p>	
			{{form::label('edition','Edition')}}
			{{ Form::text('edition', null, array('class'=>'form-control input-sm')) }}
		</p>
		<p>
			{{form::label('author_name','Author Name')}}
			{{ Form::text('author_name', null, array('class'=>'form-control input-sm')) }}
		</p>
		<p>
			{{form::label('price','Price')}}
			{{ Form::text('price', null, array('class'=>'form-control input-sm')) }}
		</p>
		<p>
			{{form::label('category','Category')}}
			{{form::select('category',array('science'=>'Science','general knowledge'=>'General Knowledge','management'=>'Management','technology'=>'Technology','arts'=>'Arts'),array('class'=>'form-control'))}}
		</p>
		<p>
			{{ Form::submit('Register', array('class'=>'btn btn-info')) }}
		</p>
		
	{{form::close()}}
@stop