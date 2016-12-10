<!doctype html>
<html>
	<meta charset="utf-8">
	<title>
			<link href="/css/app.css" type='text/css' rel='stylesheet'>
		@yield('title','The Stick')
	</title>
<head>
</head>

	<body>
	<header>
	<p> Speedy Turtle's Indexes Calculated Kickassery</p>
	<nav> 
		<ul>
			<li><a href="goals/"> Goals</a></li>
			<li><a href="workouts/">Workouts </a></li>
		</ul>
	</nav>
	</header>
	<section>
		@yield('content')
	</section>
	</body>
</html>