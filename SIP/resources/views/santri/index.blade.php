@extends('layouts.app')

@section('title', 'Data Santri')

@section('content')
@if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
@endif
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Data Santri</h5>
            <div class="card-header"><a href="{{ url('/santri/create') }}" class="btn btn-sm btn-primary">Create</a></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat, Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach($data as $santri)
                        <tr>
                            <th scope="row">{{ $nomor++ }}</th>
                            <td>{{ $santri->nisn }}</td>
                            <td>{{ $santri->nama }}</td>
                            <td>{{ $santri->tempat_lahir }}, {{ $santri->tanggal_lahir }}</td>
                            <td>{{ $santri->alamat }}</td>
                            <td>
                                <form method="post" action="{{ route('santri.destroy', $santri->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('santri.edit', $santri->id) }}">Edit</a>
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
