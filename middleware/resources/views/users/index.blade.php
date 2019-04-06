@extends('layouts.app')

@section('title', 'Users')

@section('content')

<table class="table table-bordered">
          	<tr>
          		<th style="width: 10px">No</th>
          		<th>Nama</th>
          		<th>Email</th>
          		<th>Created At</th>
          		{{-- <th>Action</th> --}}
          	</tr>
          	@php
          	$nomor = 1;
          	@endphp
          	@foreach($users as $row)
          		<tr>
          			<td>{{ $nomor++ }}</td>
          			<td>{{ $row->nama }}</td>
          			<td>{{ $row->nip }}</td>
          			<td>{{ $row->created_at }}</td>
          			{{-- <td>
          				<form action="{{ url('admin/guru/'.$row->id.'/delete') }}" method="post">
          				<a href="{{ url('admin/guru/'.$row->id.'/edit') }}" class="btn btn-primary btn-xs">Edit</a>
          					@csrf
          					@method('DELETE')
          					<button type="submit" class="btn btn-danger btn-xs">DELETE</button>
          				</form>

          			</td> --}}
          		</tr>
          	@endforeach
       		{{-- {{$guru->links()}} --}}
</table>
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
@endsection