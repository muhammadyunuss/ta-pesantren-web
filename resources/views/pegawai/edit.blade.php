@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Data Pegawai<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pegawai.index')}}">Manajemen Pegawai</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pegawai.index')}}">Data Pegawai</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pegawai.create')}}">Tambah Data Pegawai</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Edit Data Pegawai
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('pegawai.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-body">
                <div class="form-group">
                    <label for="foto_pegawai" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="foto_pegawai" name="foto_pegawai" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                    @error('foto_pegawai')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                    @if($data->foto_pegawai)
                        <img src="{{ asset('image_upload/foto_pegawai/'.$data->foto_pegawai) }}" class="img-fluid" id="img-preview" style="max-height:400px">
                    @else
                        <img class="img-fluid" id="img-preview" style="max-height:400px">
                        @error('foto_pegawai')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label for="namaPegawai">Nama Pegawai</label>
                    <input type="text" class="form-control @error('namaPegawai') is-invalid @enderror" name="namaPegawai" value="{{ old('namaPegawai', $data->nama_pegawai) }}" placeholder="Isikan nama Pegawai">
                    @error('namaPegawai')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="alamatPegawai">Alamat Pegawai</label>
                    <textarea class="form-control @error('alamatPegawai') is-invalid @enderror" name="alamatPegawai" placeholder="Isikan deskripsi Alamat Pegawai" rows="3">{{ old('alamatPegawai', $data->alamat_pegawai) }}</textarea>
                    @error('alamatPegawai')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="kontakPegawai">Kontak Pegawai</label>
                    <input type="number" class="form-control @error('kontakPegawai') is-invalid @enderror" name="kontakPegawai" value="{{ old('kontakPegawai', $data->kontak_pegawai) }}" placeholder="Isikan Nomor Handphone Pegawai">
                    @error('kontakPegawai')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggalPegawai">Tanggal Lahir Pegawai</label>
                    <input type="date" class="form-control @error('tanggalPegawai') is-invalid @enderror" name="tanggalPegawai" value="{{ old('tanggalPegawai', $data->tanggal_lahir_pegawai) }}" placeholder="Isikan Tanggal Lahir Pegawai">
                    @error('tanggalPegawai')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" data-with="100%" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-Laki' ? 'selected' : null }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : null }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="namaPesantren">Nama Pesantren</label>
                    <select name="namaPesantren" id="namaPesantren" class="form-control @error('namaPesantren') is-invalid @enderror">
                        <option value="">Pilih Nama Unit Pesantren</option>
                        @foreach($datapesantren as $dp)
                        <option value="{{ $dp->id }}" {{ old('namaPesantren', $data->pesantren_id) == $dp->id ? 'selected' : null }}>{{ $dp->nama_pesantren }}</option>
                        @endforeach
                    </select>
                    @error('namaPesantren')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan', $data->jabatan) }}" placeholder="Isikan deskripsi Jabatan">
                    @error('jabatan')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk', $data->tanggal_masuk) }}" placeholder="Isikan Tanggal Masuk">
                    @error('tanggal_masuk')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group row">
                    <label for="status_aktif" class="col-md-4 col-form-label">Status Aktif</label>
                    <div class="col-md-12">
                        <select name="status_aktif" id="status_aktif" class="form-control @error('status_aktif') is-invalid @enderror">
                            <option value="1" {{ old('namaPesantren', $data->status_aktif) == 1 ? 'selected' : null }}>Aktif</option>
                            <option value="0" {{ old('namaPesantren', $data->status_aktif) == 0 ? 'selected' : null }}>Tidak Aktif</option>
                        </select>
                        @error('status_aktif')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

</script>
@endsection

