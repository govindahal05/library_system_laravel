{{ Form::open(array('url' => 'payment', 'class' => 'well')) }}
      <div class="form-group">
        {{Form::open(['url'=>'payment'])}}
      </div>
    <div class="form-group">
        {{ Form::submit('Purchase') }}
        
      </div>


{{ Form::close() }}
