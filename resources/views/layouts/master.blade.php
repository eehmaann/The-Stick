<!doctype html>
<html>
	<meta charset="utf-8">
	<title>
		@yield('title','The Stick')
	</title>
<head>
<link href='/css/thestick.css' type='text/css' rel='stylesheet'>
<link href="/css/app.css" type='text/css' rel='stylesheet'>
</head>

	<body>
	<header>
	<h1> The Speedy Turtle's Indexes of Calculated Kickassery</h1>
	<nav>
    <ul>
        @if(Auth::check())
            <li><a href='/'>Home</a></li>
            <li><a href='/goals/create'>Add a goal</a></li>
            <li><a href='/goals/'>See your goals</a></li>
            <li><a href='/workouts/create'>Add a workout</a></li>
            <li><a href='/workouts/'>See your workouts</a></li>
            <li><a href='/logout'>Log out</a></li>
        @else
            <li><a href='/'>Home</a></li>
            <li><a href='/login'>Log in</a></li>
            <li><a href='/register'>Register</a></li>
        @endif
    </ul>
</nav>
	</header>
	<section>
		@yield('content')
	</section>
	</body>
</html>