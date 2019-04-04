<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>

	<h3>List of User</h3>

	<form method="post" action="{{ route('auth.logout') }}">
		@csrf
		<button type="submit">Logout</button>
	</form>

	<table>
		<tr>
			<td>Nama</td>
			<td>Email</td>
			<td>Youknowlaa</td>
		</tr>

		@foreach($users as $user)
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->created_at }}</td>
		</tr>
		@endforeach
		
	</table>


</body>
</html>