@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pembayaran <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pembayaran.index')}}">Manajemen Keuangan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pembayaran.index')}}">Pembayaran</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pembayaran.create')}}">Tambah Pembayaran</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Pembayaran
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('pengeluaran-pemasukan.update', $data->id) }}" enctype="multipart/form-data">
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
                    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                    <div>
                        <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', date('Y-m-d', $data->tanggal_pembayaran==null ? null : strtotime($data->tanggal_pembayaran)))}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pembayaran_id">Pembayaran</label>
                    <select name="pembayaran_id" id="pembayaran_id" data-with="100%" class="form-control @error('pembayaran_id') is-invalid @enderror" required>
                        <option value="">Pilih Pembayaran</option>
                        @foreach ($pembayaran as $s)
                        <option value="{{ $s->id }}" {{ old('pembayaran_id', $s->id) == $data->pembayaran_id ? 'selected' : null }}>{{ $s->nama_pembayaran }} - {{ $s->jenis_pembayaran }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kredit_pembayaran">Nominal</label>
                    <div>
                        <input type="number" id="kredit_pembayaran" name="kredit_pembayaran" class="form-control @error('kredit_pembayaran') is-invalid @enderror" value="{{ $data->kredit_pembayaran }}" placeholder="Nominal">
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan_pembayaran">Keterangan</label>
                    <div>
                        <input type="text" id="keterangan_pembayaran" name="keterangan_pembayaran" class="form-control @error('keterangan_pembayaran') is-invalid @enderror" value="{{ $data->keterangan_pembayaran }}" placeholder="Keterangan">
                    </div>
                </div>
                <div class="form-group">
                    <label>Status Bayar</label>
                    <div class="radio-list">
                        <label class="radio-inline"><input type="radio" name="status_pembayaran" id="status_pembayaran" value="Lunas" {{ $data->status_pembayaran=="Lunas" ? 'checked': '' }}>Lunas </label>
                        <label class="radio-inline"><input type="radio" name="status_pembayaran" id="status_pembayaran" value="Belum Lunas" {{ $data->status_pembayaran=="Belum Lunas" ? 'checked': '' }}>Belum Lunas </label>
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
