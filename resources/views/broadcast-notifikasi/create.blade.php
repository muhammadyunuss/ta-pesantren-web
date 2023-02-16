@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Broadcast Notifikasi<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('broadcast-notifikasi.index')}}">Manajemen Akademik</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('broadcast-notifikasi.index')}}">Broadcast Notifikasi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('broadcast-notifikasi.create')}}">Tambah Broadcast Notifikasi</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Pembayaran
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('broadcast-notifikasi.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
                        <label for="pesantren_id">Pesantren</label>
                        <select name="pesantren_id" id="pesantren_id" data-with="100%" class="form-control @error('pesantren_id') is-invalid @enderror">
                            <option value="{{ $pesantren->id }}">{{ $pesantren->nama_pesantren }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Pemberitahuan</label>
                        <div>
                            <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Pemberitahuan</label>
                        <div>
                            <textarea name="isi" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="walisantri_id">Walisantri</label>
                        <select name="walisantri_id" id="walisantri_id" data-with="100%" class="form-control @error('walisantri_id') is-invalid @enderror" required>
                            <option value="0">Semua Walisantri</option>
                            @foreach ($walisantri as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_walisantri }}</option>
                            @endforeach
                        </select>
                    </div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

</script>
@endsection
