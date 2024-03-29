@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Presensi Santri Kelas<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('presensi-santri-kelas.index')}}">Manajemen Akademik</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('presensi-santri-kelas.index')}}">Presensi Santri Kelas</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('presensi-santri-kelas.create')}}">Tambah Presensi Santri Kelas</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Presensi Santri Kelas
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('presensi-santri-kelas.store') }}" enctype="multipart/form-data">
			@csrf
                <div class="form-body">
                    @if (Auth::user()->hasRole('super-admin'))
                    <div class="form-group">
                        <label for="pesantren_id">Pesantren</label>
                        <select name="pesantren_id" id="pesantren_id" data-with="100%" class="form-control @error('pesantren_id') is-invalid @enderror">
                            <option value="">Pilih Pesantren</option>
                            @foreach ($pesantren as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_pesantren }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="pesantren_id">Pesantren</label>
                        <select name="pesantren_id" id="pesantren_id" data-with="100%" class="form-control @error('pesantren_id') is-invalid @enderror">
                            <option value="{{ $pesantren->id }}">{{ $pesantren->nama_pesantren }}</option>
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="santri_id">Santri</label>
                        <select name="santri_id" id="santri_id" data-with="100%" class="form-control @error('santri_id') is-invalid @enderror">
                            <option value="">Pilih Santri</option>
                            @foreach ($santri as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_santri }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select name="kelas_id" id="kelas_id" data-with="100%" class="form-control @error('kelas_id') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_presensi">Tanggal Presensi</label>
                        <div>
                            <input type="datetime-local" id="tanggal_presensi" name="tanggal_presensi" class="form-control @error('tanggal_presensi') is-invalid @enderror" placeholder="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <select name="keterangan" id="keterangan" data-with="100%" class="form-control @error('keterangan') is-invalid @enderror">
                            <option value="">Pilih</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Ijin">Ijin</option>
                            <option value="Alpha">Alpha</option>
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
