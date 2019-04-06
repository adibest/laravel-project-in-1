@extends('layouts.app')

@section('title', 'Edit Santri')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Blank Pageheader </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blank Pageheader</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform" tabindex="-1">
            <h3 class="section-title">Basic Form Elements</h3>
            <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
        </div>
        <div class="card">
            <h5 class="card-header">Basic Form</h5>
            <div class="card-body">
                <form method="post" action="{{ route('santri.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">NISN</label>
                        <input id="inputText3" type="text" class="form-control" name="nisn" value="{{ $data->nisn }}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama</label>
                        <input id="inputText3" type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tempat Lahir</label>
                        <input id="inputText3" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tanggal lahir</label>
                        <input id="inputText3" type="date" class="form-control" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ $data->alamat }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection