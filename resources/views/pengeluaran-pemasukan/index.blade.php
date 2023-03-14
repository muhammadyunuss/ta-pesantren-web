@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pengeluaran Pemasukan | {{ $pesantren->nama_pesantren }} &nbsp;&nbsp;
    <a type= "button" href="{{route('pengeluaran-pemasukan.create-pemasukan')}}" class="btn btn-primary btn-sm">
        + TAMBAH PEMASUKAN
    </a>
    |
    <a type= "button" href="{{route('pengeluaran-pemasukan.create-pengeluaran')}}" class="btn btn-primary btn-sm">
        + TAMBAH PENGELUARAN
    </a>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pengeluaran-pemasukan.index')}}">Pengeluaran Pemasukan</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i>Pemasukan
        </div>
    </div>
    <div class="portlet-body form">
        <table class="table" id="sample_1">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Debet</th>
                {{-- <th>Kredit</th> --}}
                <th>Nama Santri</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($data_pemasukan as $d)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $d->tanggal_pembayaran }}</td>
                <td>{{ $d->nama_pembayaran }}</td>
                <td>{{ $d->keterangan_pembayaran }}</td>
                <td>Rp. {{ number_format($d->debet_pembayaran ,2,',','.') }}</td>
                {{-- <td>Rp. {{ number_format($d->kredit_pembayaran ,2,',','.') }}</td> --}}
                <td>{{ $d->nama_santri }}</td>
                <td>{{ $d->status_pembayaran }}</td>
                <td>
                    <ul class="nav nav-pills">
                        <li >
                            <button onclick="window.location='{{ route('pengeluaran-pemasukan.edit-pemasukan', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
                        </li>
                        <li>
                            <form method="POST" action="{{route('pengeluaran-pemasukan.destroy' , $d->id)}}">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                                onclick="if(!confirm('Apakah Anda yakin akan menghapus data yang berkaitan tersebut ?')) {return false;}">
                            </form>
                        </li>
                    </ul>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Pengeluaran
        </div>
    </div>
    <div class="portlet-body form">
        <table class="table" id="sample_2">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Keterangan</th>
                {{-- <th>Debet</th> --}}
                <th>Kredit</th>
                <th>Nama Santri</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($data_pengeluaran as $d)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $d->tanggal_pembayaran }}</td>
                <td>{{ $d->nama_pembayaran }}</td>
                <td>{{ $d->keterangan_pembayaran }}</td>
                {{-- <td>Rp. {{ number_format($d->debet_pembayaran ,2,',','.') }}</td> --}}
                <td>Rp. {{ number_format($d->kredit_pembayaran ,2,',','.') }}</td>
                <td>{{ $d->nama_santri }}</td>
                <td>{{ $d->status_pembayaran }}</td>
                <td>
                    <ul class="nav nav-pills">
                        <li >
                            <button onclick="window.location='{{ route('pengeluaran-pemasukan.edit-pengeluaran', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
                        </li>
                        <li>
                            <form method="POST" action="{{route('pengeluaran-pemasukan.destroy' , $d->id)}}">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                                onclick="if(!confirm('Apakah Anda yakin akan menghapus data yang berkaitan tersebut ?')) {return false;}">
                            </form>
                        </li>
                    </ul>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script>
jQuery(document).ready(function() {
	//plugin datatable
	$('#sample_1').DataTable();
	$('#sample_2').DataTable();

});
</script>
@stop
