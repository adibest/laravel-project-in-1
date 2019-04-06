<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form method="post" action="{{ url('/login') }}">
		@csrf

		<div>
			Email: <input type="email" name="email">
		</div>
		<div>
			Password: <input type="password" name="password">
		</div>

		<input type="submit" name="submit">
		
	</form>

</body>
</html>