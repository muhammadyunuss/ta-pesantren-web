@extends('layouts.layout')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Data Pegawai
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
        <a type="button" href="{{route('pegawai.create')}}" class="btn btn-fit-height default">
            + TAMBAH DATA PEGAWAI
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
                <th>Nama Pegawai</th>
                <th>Tanggal Lahir</th>
                <th>Alamat Santri</th>
                <th>Kontak Pegawai</th>
                <th>Unit Pegawai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->foto_pegawai }}</td>
                <td>{{ $d->nama_pegawai }}</td>
                <td>{{ $d->tanggal_lahir_pegawai }}</td>
                <td>{{ $d->alamat_pegawai }}</td>
                <td>{{ $d->kontak_pegawai }}</td>
                <td>{{ $d->nama_pesantren }}</td>

                <td>
                    <a class="btn btn-success" href="{{ route('pegawai.edit', $d->id) }}">Ubah</a> <br> <br>
                    <form method="POST" action="{{route('pegawai.destroy' , $d->id)}}">
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
