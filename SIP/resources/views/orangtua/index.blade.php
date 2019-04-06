@extends('layouts.app')

@section('title', 'Data Orang Tua')

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
            <h5 class="card-header">Data Orang Tua</h5>
            <div class="card-header"><a href="{{ url('/orangtua/create') }}" class="btn btn-sm btn-primary">Create</a></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kedudukan</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach($data as $orangtua)
                        <tr>
                            <th scope="row">{{ $nomor++ }}</th>
                            <td>{{ $orangtua->nik }}</td>
                            <td>{{ $orangtua->nama }}</td>
                            <td>@if($orangtua->gender == 'L')
                                    Ayah
                                @else
                                    Ibu
                                @endif
                                 {{ $orangtua->santri->nama }}
                            </td>
                            <td>{{ $orangtua->pekerjaan }}</td>
                            <td>{{ $orangtua->pendidikan }}</td>
                            <td>
                                <form method="post" action="{{ route('orangtua.destroy', $orangtua->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('orangtua.edit', $orangtua->id) }}">Edit</a>
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
