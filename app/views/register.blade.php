@extends('layouts.frontend')

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Member Registration</h3>

      </div>
     <div class="panel-body">

      {{ Form::open(array('url' => 'register','class'=>'form-control')) }}
      <div class="form-group">
        {{ Form::label('name','Name')}}
        {{ Form::text('name', null, array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('address','Address')}}
        {{ Form::text('address', null, array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('phone','Phone')}}
        {{ Form::text('phone', null, array('class'=>'form-control')) }}
        
      </div>
      <div class="form-group">
        {{ Form::label('email','Email')}}
        {{ Form::text('email', null, array('class'=>'form-control')) }}
        
      </div>
      <div class="form-group">
        {{ Form::label('gender','Gender')}}
        Male:{{Form::radio('gender', 'm')}}
        Female:{{Form::radio('gender', 'f',true)}}
        
      </div>
      <div class="form-group">
        {{ Form::label('number','Username')}}
        {{ Form::text('username', null, array('class'=>'form-control')) }}
        
      </div>
      <div class="form-group">
        {{ Form::label('password','Password')}}
        {{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password')) }}
      </div>
      {{ Form::submit('Register', array('class'=>'btn btn-info btn-block')) }}
  {{ Form::close() }}
  </div>
  </div></div></div>

@stop
