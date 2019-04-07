@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')

<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Edit Data Pengguna</h5>
            <div class="card-body">
                <form method="post" action="{{ route('pengguna.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama</label>
                        <input id="inputText3" type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                        @foreach ($errors->get('nama') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Email</label>
                        <input id="inputText3" type="email" class="form-control" name="email" value="{{ $data->email }}">
                        @foreach ($errors->get('email') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Password</label>
                        <input id="inputText3" type="password" class="form-control" name="password" value="{{ $data->password }}">
                        @foreach ($errors->get('password') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div><a href="{{ url('/pengguna') }}" class="btn btn-secondary pull-right">Kembali</a></div>
    </div>
</div>

@endsection