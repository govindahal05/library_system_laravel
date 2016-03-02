@extends('layouts.default_member')

@section('content')
			

	<h1>Enter your New Password</h1>
	{{ Form::open(array('url' => url('changeprocess'), 'class'=>'form' )) }}
	
		<p>{{ Form::password('password',null,array('placeholder'=>'your password')) }}</p>

		{{ Form::submit('reset')}}
	{{ Form::close() }}
	@if (\Session::has('message'))
		<div>
		 		<h3 class="warmsg">{{ \Session::get('message') }} </h3>
		 	</div>
	@endif

@stop