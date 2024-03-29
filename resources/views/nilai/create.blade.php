@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Nilai<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('nilai.index')}}">Manajemen Akademik</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('nilai.index')}}">Nilai</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('nilai.create')}}">Tambah Nilai</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah NIlai
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('nilai.store') }}" enctype="multipart/form-data">
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
                        <label for="matapelajaran_id">Mata Pelajaran</label>
                        <select name="matapelajaran_id" id="matapelajaran_id" data-with="100%" class="form-control @error('matapelajaran_id') is-invalid @enderror">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai_tugas">Nilai Tugas</label>
                        <div>
                            <input type="number" class="form-control @error('nilai_tugas') is-invalid @enderror" id="nilai_tugas" name="nilai_tugas" value="{{ old('nilai_tugas') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nilai_uts">Nilai UTS</label>
                        <div>
                            <input type="number" class="form-control @error('nilai_uts') is-invalid @enderror" id="nilai_uts" name="nilai_uts" value="{{ old('nilai_uts') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nilai_uas">Nilai UAS</label>
                        <div>
                            <input type="number" class="form-control @error('nilai_uas') is-invalid @enderror" id="nilai_uas" name="nilai_uas" value="{{ old('nilai_uas') }}">
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
