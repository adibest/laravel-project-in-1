<!DOCTYPE html>
<html>
<head>
	<title>cek</title>
</head>
<body>
	
	<form method="get" action="{{ url('/film') }}">
		@csrf
		<label>
			Umur Anda:
			<input type="text" name="umur">
		</label>

		<label>
			<button type="submit">Submit</button>
		</label>
	</form>
	

</body>
</html>