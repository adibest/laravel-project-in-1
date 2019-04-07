@extends('layouts.app')

@section('title', 'Daftar Pengguna')

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
            <h5 class="card-header">Data Pengguna</h5>
            <div class="card-header"><a href="{{ url('/pengguna/create') }}" class="btn btn-sm btn-primary">Create</a></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach($data as $pengguna)
                        <tr>
                            <th scope="row">{{ $nomor++ }}</th>
                            <td>{{ $pengguna->nama }}</td>
                            <td>{{ $pengguna->email }}</td>
                            <td>
                                <form method="post" action="{{ route('pengguna.destroy', $pengguna->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('pengguna.edit', $pengguna->id) }}">Edit</a>
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