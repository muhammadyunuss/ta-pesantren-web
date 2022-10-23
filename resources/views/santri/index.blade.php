@extends('layouts.layout')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Data Santri
    <small>statistics and more</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">
        </li>
    </ul>
</div>

<div class="page-content">
    <div>
        <a type="button" href="{{route('santri.create')}}" class="btn btn-fit-height default">
            + TAMBAH DATA SANTRI
        </a>
    </div>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (session('statushapus'))
    <div class="alert alert-danger">
        {{ session('statushapus') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Gambar</th>
                <th>NIS</th>
                <th>Nama Santri</th>
                <th>Tanggal Lahir</th>
                <th>Alamat Santri</th>
                <th>Nama Ayah Santri</th>
                <th>Nama Ibu Santri</th>
                <th>Nama Kamar Santri</th>
                <th>Nama Gedung Santri</th>
                <th>Status Aktif Santri</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->foto_santri }}</td>
                <td>{{ $d->nis }}</td>
                <td>{{ $d->nama_santri }}</td>
                <td>{{ $d->tanggal_lahir_santri }}</td>
                <td>{{ $d->alamat_santri }}</td>
                <td>{{ $d->nama_ayah }}</td>
                <td>{{ $d->nama_ibu }}</td>
                <td>{{ $d->kamar_santri }}</td>
                <td>{{ $d->asrama_santri }}</td>
                <td>{{ $d->status_aktif }}</td>

                <td>
                    <a class="btn btn-success" href="{{ route('santri.edit', $d->id) }}">Ubah</a> <br> <br>
                    <form method="POST" action="{{route('santri.destroy' , $d->id)}}">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="SUBMIT" value="Hapus" onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    @endsection
