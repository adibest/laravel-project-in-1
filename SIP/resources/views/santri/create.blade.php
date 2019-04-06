@extends('layouts.app')

@section('title', 'Create Santri')

@section('content')

<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Tambah Data Santri</h5>
            <div class="card-body">
                <form method="post" action="{{ route('santri.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">NISN</label>
                        <input id="inputText3" type="text" class="form-control" name="nisn" value="{{ old('nisn') }}">
                        @foreach ($errors->get('nisn') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama</label>
                        <input id="inputText3" type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        @foreach ($errors->get('nama') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tempat Lahir</label>
                        <input id="inputText3" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        @foreach ($errors->get('tempat_lahir') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tanggal lahir</label>
                        <input id="inputText3" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @foreach ($errors->get('tanggal_lahir') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                        @foreach ($errors->get('alamat') as $message)
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
        <div><a href="{{ url('/santri') }}" class="btn btn-secondary text-right">Kembali</a></div>
    </div>
</div>

@endsection