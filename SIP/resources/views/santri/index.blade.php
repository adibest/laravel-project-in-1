@extends('layouts.app')

@section('title', 'Data Santri')

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
<!-- ============================================================== -->
<!-- end pageheader -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Data Santri</h5>
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
