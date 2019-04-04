<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form method="post" action="{{ route('auth.login') }}">
		@csrf
		<label>
			Email:
			<input type="email" name="email">
		</label>

		<br>

		<label>
			Password:
			<input type="password" name="password">
		</label>

		<br>

		<button type="submit">Submit</button>
	</form>

</body>
</html>