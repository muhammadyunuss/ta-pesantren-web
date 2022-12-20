@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Ulang <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-ulang.index')}}">Manajemen Keuangan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-ulang.index')}}">Daftar Ulang</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-ulang.create')}}">Tambah Daftar Ulang</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Daftar Ulang
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('daftar-ulang.update', $data->id) }}" enctype="multipart/form-data">
			@csrf
			@method("PUT")
            <div class="form-body">
                <div class="form-group">
                    <label for="pesantren_id">Pesantren</label>
                    <select name="pesantren_id" id="pesantren_id" data-with="100%" class="form-control @error('pesantren_id') is-invalid @enderror">
                        <option value="{{ $pesantren->id }}">{{ $pesantren->nama_pesantren }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pegawai_id">Pegawai</label>
                    <select name="pegawai_id" id="pegawai_id" data-with="100%" class="form-control @error('pegawai_id') is-invalid @enderror" required>
                        <option value="">Pilih Pegawai</option>
                        @foreach ($pegawai as $s)
                        <option value="{{ $s->id }}" {{ old('pegawai_id', $s->id) == $data->pegawai_id  ? 'selected' : null }}>{{ $s->nama_pegawai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_pembayaran">Nama Daftar Ulang</label>
                    <div>
                        <input type="text" id="nama_pembayaran" name="nama_pembayaran" class="form-control @error('nama_pembayaran') is-invalid @enderror" placeholder="Nama Daftar Ulang" value="{{ $data->nama_pembayaran }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_pembayaran">Jenis Daftar Ulang</label>
                    <select name="jenis_pembayaran" id="jenis_pembayaran" data-with="100%" class="form-control @error('jenis_pembayaran') is-invalid @enderror">
                        <option value="">Pilih</option>
                        <option value="Tunai" {{ old('jenis_pembayaran', "Tunai") == $data->jenis_pembayaran  ? 'selected' : null }}>Tunai</option>
                        <option value="Transfer" {{ old('jenis_pembayaran', "Transfer") == $data->jenis_pembayaran  ? 'selected' : null }}>Transfer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nominal_pembayaran">Nominal Daftar Ulang</label>
                    <div>
                        <input type="number" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control @error('nominal_pembayaran') is-invalid @enderror" placeholder="Nominal" value="{{ $data->nominal_pembayaran }}">
                    </div>
                </div>
            </div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Ubah</button>
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
