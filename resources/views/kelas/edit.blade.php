@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pengunaan Bahan Baku <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kelas.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kelas.index')}}">Pengunaan Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kelas.create')}}">Tambah Pengunaan Bahan Baku</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Supplier
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('kelas.update', $data->id) }}" enctype="multipart/form-data">
			@csrf
			@method("PUT")
                <div class="form-body">
                    {{-- <div class="form-group">
                        <label for="pesantren_idpesantren">Pesantren</label>
                        <select name="pesantren_idpesantren" id="pesantren_idpesantren" data-with="100%" class="form-control @error('pesantren_idpesantren') is-invalid @enderror">
                                <option value="{{ $data->pesantren_idpesantren }}" {{ old('pesantren_idpesantren', $data->pesantren_idpesantren) == $data->pesantren_idpesantren  ? 'selected' : null }}>{{ $data->nama_pesantren }}</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="pesantren_idpesantren">Pesantren</label>
                        <select name="pesantren_idpesantren" id="pesantren_idpesantren" data-with="100%" class="form-control @error('pesantren_idpesantren') is-invalid @enderror">
                            <option value="{{ $pesantren->id }}">{{ $pesantren->nama_pesantren }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <div>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', $data->nama_kelas) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guru_idguru">Guru</label>
                        <select name="guru_idguru" id="guru_idguru" data-with="100%" class="form-control @error('guru_idguru') is-invalid @enderror">
                            <option value="">Pilih Guru</option>
                            @foreach ($guru as $g)
                            <option value="{{ $g->id }}" {{ old('guru_idguru', $g->id) == $data->guru_idguru  ? 'selected' : null }}>{{ $g->nama_guru }}</option>
                            @endforeach
                        </select>
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
