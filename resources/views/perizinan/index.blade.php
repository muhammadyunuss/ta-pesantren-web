@extends('layouts.layout')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Daftar Data Perizinan Santri
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
        <a type="button" href="{{route('perizinans.create')}}" class="btn btn-fit-height default">
            + TAMBAH DATA PERIZINAN SANTRI
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
                <th>Nama Perizinan</th>
                <th>Keterangan Perizinan</th>
                <th>Tanggal Awal Perizinan</th>
                <th>Tanggal Selesai Perizinan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->nama_santri }}</td>
                <td>{{ $d->riwayat_pelanggaran }}</td>
                <td>{{ $d->keterangan_pelanggaran }}</td>
                <td>{{ $d->tanggal_pelanggaran }}</td>
                <td>{{ $d->tanggal_pelanggaran }}</td>

                <td>
                    <a class="btn btn-success" href="{{ route('perizinans.edit', $d->id) }}">Ubah</a> <br> <br>
                    <form method="POST" action="{{route('perizinans.destroy' , $d->id)}}">
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
