<!DOCTYPE html>
<html>
<head>
	<title>Member panel</title>
	{{ HTML::style('css/styles.css') }}
</head>
<body>
	<div id="header"><h1>Library Management System</h1></div>
	
	<div id = 'navigation'>
		<h2>Member Panel</h2>
		<a href="displaybook">List Book</a><br />
		<a href="booktaken"> Issued Book</a>
	</div>
	
	<div class="view-content">
		<h2>Welcome ... </h2>
		@yield('content') 
	</div>
	
</body>
</html>
