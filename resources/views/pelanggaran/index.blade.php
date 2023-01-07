@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Data Pelanggaran Santri &nbsp;&nbsp;
    <a type= "button" href="{{route('pelanggaran.create')}}" class="btn btn-primary btn-sm">
        + Tambah Daftar Data Pelanggaran Santri
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
            <a href="{{route('pelanggaran.index')}}">Daftar Data Pelanggaran Santri</a>
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

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table" id="sample_1">
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>Nama Santri</th>
            <th>Riwayat Pelanggaran</th>
            <th>Keterangan Pelangaran</th>
            <th>Tanggal Riwayat Prestasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->nama_santri }}</td>
            <td>{{ $d->riwayat_pelanggaran }}</td>
            <td>{{ $d->keterangan_pelanggaran }}</td>
            <td>{{ $d->tanggal_pelanggaran }}</td>

            <td>
                <a class="btn btn-success" href="{{ route('pelanggaran.edit', $d->id) }}">Ubah</a> <br> <br>
                <form method="POST" action="{{route('pelanggaran.destroy' , $d->id)}}">
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

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script>
jQuery(document).ready(function() {
	//plugin datatable
	$('#sample_1').DataTable();
});
</script>
@stop


