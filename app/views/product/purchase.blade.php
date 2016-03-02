<!DOCTYPE html>
<html>
<head>
	<title>Product purchase</title>
</head>
<body>
      {{ Form::open(array('url' => 'pay','class'=>'form-control')) }}
      	<p>	
      		{{Form::label('productName', 'Product Name')}}
      		{{Form::text('productName',null,array('placeholder'=>'product name'))}}
      	</p>
      	<p>	
      		{{Form::label('productQuantity', 'Product Quantity')}}
      		{{Form::text('productQuantity',null,array('placeholder'=>'product quantity'))}}
      	</p>
      	<p>	
      		{{Form::label('productPrice', 'Product Price')}}
      		{{Form::text('productPrice',null,array('placeholder'=>'product price'))}}
      	</p>
      	{{Form::submit('Purchase!')}}
      {{Form::close()}}

</body>
</html>