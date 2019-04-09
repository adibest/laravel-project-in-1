<!DOCTYPE html>
<html>
<head>
	<title>Profil Accessor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container text-center">
		<div class="jumbotron">
			<a href="/profil">
				<h1>Profil</h1>
				<a href="{{ route('profil.index') }}" class="btn btn-sm btn-primary">List</a>
			</a>
		</div>
		<form method="post" action="{{ route('profil.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-row">
				<div class="col-auto">
					<input type="text" name="depan" class="form-control" placeholder="Nama Depan">
				</div>
				<div class="col-auto">
					<input type="text" name="belakang" class="form-control" placeholder="Nama Belakang">
				</div>
				<div class="col-auto">
					<input type="text" name="alamat" class="form-control" placeholder="Alamat">
				</div>
			</div>
			<div class="form-row mt-3">
				<div class="col-6">
					<input type="file" class="form-control-file" name="file">
				</div>
				<div class="col-4 text-left">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
		<br>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>