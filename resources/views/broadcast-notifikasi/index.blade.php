@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Broadcast Notifikasi &nbsp;&nbsp;
    <a type= "button" href="{{route('broadcast-notifikasi.create')}}" class="btn btn-primary btn-sm">
        + Tambah Broadcas Notifikasi
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
            <a href="{{route('broadcast-notifikasi.index')}}">Broadcast Notifikasi</a>
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
    <th>No</th>
    <th>Judul Pemberitahuan</th>
    <th>Isi Pemberitahuan</th>
    <th>Walisantri</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @php
        $no = 1;
    @endphp
    @foreach($data as $d)
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $d->judul }}</td>
    <td>{{ $d->isi }}</td>
    @if ($d->nama_walisantri == null)
    <td>Semua</td>
    @else
    <td>{{ $d->nama_walisantri }}</td>
    @endif
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('broadcast-notifikasi.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('broadcast-notifikasi.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin akan menghapus data ?')) {return false;}">
                </form>
            </li>
        </ul>
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
