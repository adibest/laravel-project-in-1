@extends('layouts.app')

@section('title', 'Edit Orang Tua')

@section('content')

<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Edit Data Orang Tua</h5>
            <div class="card-body">
                <form method="post" action="{{ route('orangtua.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">NIK</label>
                        <input id="inputText3" type="text" class="form-control" name="nik" value="{{ $data->nik }}">
                        @foreach ($errors->get('nik') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
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
                        <label for="inputText3" class="col-form-label">Ayah / Ibu</label>
                        <div>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" class="custom-control-input" value="L"><span class="custom-control-label">Ayah</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" class="custom-control-input" value="P"><span class="custom-control-label">Ibu</span>
                            </label>
                        </div>
                        @foreach ($errors->get('gender') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="input-select">dari</label>
                        <select class="form-control" id="input-select" name="id_santri" value="{{ $data->id_santri }}">
                            @foreach ($santri as $item)
                            <option value="{{ $item->id }}" {{ ( $item->id == $data->id_santri) ? 'selected' : '' }}> {{ $item->nama }} </option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('id_santri') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Pekerjaan</label>
                        <input id="inputText3" type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}">
                        @foreach ($errors->get('pekerjaan') as $message)
                            <div class="text text-danger">
                              {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pendididikan</label>
                        <input id="inputText3" type="text" class="form-control" name="pendidikan" value="{{ $data->pendidikan }}">
                        @foreach ($errors->get('pendidikan') as $message)
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
        <div><a href="{{ url('/orangtua') }}" class="btn btn-secondary text-right">Kembali</a></div>
    </div>
</div>

@endsection