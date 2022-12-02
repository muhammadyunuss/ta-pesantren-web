@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pemasukan<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pengeluaran-pemasukan.index')}}">Manajemen Keuangan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pengeluaran-pemasukan.index')}}">Pemasukan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pengeluaran-pemasukan.create')}}">Tambah Pemasukan</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Pemasukan
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('pengeluaran-pemasukan.store') }}" enctype="multipart/form-data">
			@csrf
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
                            <option value="{{ $s->id }}">{{ $s->nama_pegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_pembayaran">Nama Pemasukan</label>
                        <div>
                            <input type="text" id="nama_pembayaran" name="nama_pembayaran" class="form-control @error('nama_pembayaran') is-invalid @enderror" placeholder="Nama Pemasukan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pemasukan</label>
                        <select name="jenis_pembayaran" id="jenis_pembayaran" data-with="100%" class="form-control @error('jenis_pembayaran') is-invalid @enderror">
                            <option value="">Pilih</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Inline Radio</label>
                        <div class="radio-list">
                            <label class="radio-inline">
                            <div class="radio" id="uniform-optionsRadios4"><span class=""><input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""></span></div> Option 1 </label>
                            <label class="radio-inline">
                            <div class="radio" id="uniform-optionsRadios5"><span class="checked"><input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"></span></div> Option 2 </label>
                            <label class="radio-inline">
                            <div class="radio disabled" id="uniform-optionsRadios6"><span><input type="radio" name="optionsRadios" id="optionsRadios6" value="option3" disabled=""></span></div> Disabled </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal_pembayaran">Nominal Pemasukan</label>
                        <div>
                            <input type="number" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control @error('nominal_pembayaran') is-invalid @enderror" placeholder="Nominal">
                        </div>
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
