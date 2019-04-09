<!DOCTYPE html>
<html>
<head>
	<title>Profil Accessor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container text-center">
		<div class="jumbotron">
			<h1>List Profil</h1>
			<a href="{{route('profil.create')}}" class="btn btn-primary btn-sm">Tambah Profile</a>
		</div>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Image</th>
		      <th scope="col">Nama Lengkap</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Avatar</th>
		    </tr>
		  </thead>
		  @php
		  	$no = 1;
		  @endphp
		  <tbody>
		  	@foreach($avas as $row)
		    <tr>
		      <th scope="row">{{ $no++ }}</th>
		      <td>okoc</td>
		      <td>{{ $row->nama }}</td>
		      <td>{{ $row->alamat }}</td>
		      <td>
		      	<!-- Button trigger modal -->
		      	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{$row->depan}}">
		      		Show Avatar
		      	</button>
		      	<!-- Modal -->
		      	<div class="modal fade" id="{{$row->depan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      	  <div class="modal-dialog" role="document">
		      	    <div class="modal-content">
		      	      <div class="modal-header">
		      	        <h5 class="modal-title" id="exampleModalLabel">Avatar</h5>
		      	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		      	          <span aria-hidden="true">&times;</span>
		      	        </button>
		      	      </div>
		      	      <div class="modal-body text-center">
		      	          {{-- <img src="{{ Avatar::create($row->nama)->toBase64() }}" class="img-fluid"/> --}}
		      	          <img style="max-width: 300px;" class="col-3" src="{{ Storage::url($row->file) }}">
		      	      </div>
		      	    </div>
		      	  </div>
		      	</div>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>