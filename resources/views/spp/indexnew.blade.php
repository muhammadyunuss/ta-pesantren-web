@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    SPP | {{ $pesantren->nama_pesantren }} &nbsp;&nbsp;
    <a type= "button" href="{{route('spp.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH SPP
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
            <a href="{{route('spp.index')}}">SPP</a>
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
    <th>Nama Santri</th>
    <th>Jan</th>
    <th>Feb</th>
    <th>Mar</th>
    <th>Apr</th>
    <th>May</th>
    <th>Jun</th>
    <th>Jul</th>
    <th>Aug</th>
    <th>Sep</th>
    <th>Oct</th>
    <th>Nov</th>
    <th>Dec</th>
    </tr>
</thead>
<tbody>
    @php
        $no = 1;
        $term = 'Spp';
    @endphp
    @foreach($santris as $santri => $result)
    <tr align="center">
        <td>{{ $santri + 1 }}</td>
        <td><p>{{ $result->nama_santri }}</p></td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '01')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '02')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '03')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '04')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '05')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '06')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '07')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '08')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '09')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '10')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '11')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-checkbox" style="display: flex">
                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')->where('pembayaran.nama_pembayaran','LIKE','%'.$term.'%')->where('status_pembayaran', 'Lunas')->where('santri_id', $result->id)->whereMonth('tanggal_pembayaran', '12')->where( DB::raw('YEAR(tanggal_pembayaran)'), $now )->exists()) checked @endif>
                <label class="custom-control-label" for="cbx-2"></label>
            </div>
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
