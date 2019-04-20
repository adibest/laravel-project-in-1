<!DOCTYPE html>
<html>
<head>
	<title>article</title>
	<style type="text/css">
		table {
			width: 100%;
			border: 1px solid black;
		}
	</style>
</head>
<body>

	<div>
		<form method="post" action="{{ route('articles.store') }}">
			@csrf
			<p>
				<input type="text" name="title" placeholder="title">
			</p>
			<p>
				<textarea name="content" placeholder="content"></textarea>
			</p>
			<p>
				<input type="submit">
			</p>
		</form>
	</div>

	<table border="1">
		<tr>
			<th>Title</th>
			<th>Created At</th>
			<th>Action</th>
		</tr>
		@foreach($articles as $article)

		<tr>
			<td>{{ $article->title }}</td>
			<td>{{ $article->content }}</td>
			<td>
				<form method="post" action="{{ route('articles.destroy', $article->id) }}">
					@csrf @method('DELETE')
					<button>Delete</button>
				</form>
				<form method="post" action="{{ route('articles.forceDelete', $article->id) }}">
					@csrf @method('DELETE')
					<button>Force Delete</button>
				</form>
			</td>
		</tr>

		@endforeach
	</table>

</body>
</html>