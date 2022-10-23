@extends('layouts.layout')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Daftar Data Prestasi Santri
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
        <a type="button" href="{{route('prestasi.create')}}" class="btn btn-fit-height default">
            + TAMBAH DATA PRESTASI SANTRI
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
                <th>Nama Santri</th>
                <th>Keterangan Prestasi</th>
                <th>Riwayat Prestasi</th>
                <th>Tanggal Prestasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->nama_santri }}</td>
                <td>{{ $d->riwayat_prestasi }}</td>
                <td>{{ $d->keterangan_prestasi }}</td>
                <td>{{ $d->tanggal_prestasi }}</td>

                <td>
                    <a class="btn btn-success" href="{{ route('prestasi.edit', $d->id) }}">Ubah</a> <br> <br>
                    <form method="POST" action="{{route('prestasi.destroy' , $d->id)}}">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="SUBMIT" value="Hapus" onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

    @endsection
