@extends('layouts.layout')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Data Pesantren
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
        <a type="button" href="{{route('pesantrens.create')}}" class="btn btn-fit-height default">
            + TAMBAH DATA PESANTREN
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

                <th>Nama Pesantren</th>
                <th>Alamat Pesantren</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->nama_pesantren }}</td>
                <td>{{ $d->alamat_pesantren }}</td>

                <td>
                    <a class="btn btn-success" href="{{ route('pesantrens.edit', $d->id) }}">Ubah</a> <br> <br>
                    <form method="POST" action="{{route('pesantrens.destroy' , $d->id)}}">
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
