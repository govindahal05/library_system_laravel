<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<!-- {{ HTML::style('css/bootstrap.min.css') }} -->
	{{ HTML::style('css/styles.css') }}
</head>
<body>
	<div id="header"><h1>Library Management System</h1></div>
	
	<div id = 'navigation'>
		<h2>Admin Panel</h2>
		<h3>{{ link_to("/logout",'logout')}}</h3>
			<p>
    			{{ link_to("/addbook",'Add Book')}}
    		</p>
    		<p>
    			{{ link_to("/showbook",'Show Book')}}
    		</p>
	</div>
	
	<div class="view-content">
	 <h3>Welcome Admin </h3>
	@yield('content')	</div>
	
</body>
</html>
