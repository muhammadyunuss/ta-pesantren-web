@extends('layouts.layout')
@section('content')
<div class="page-content">
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
                        <label for="image">Gambar Pegawai</label>
                        <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $data->foto_pegawai) }}" placeholder="Isikan gambar Anda">
                        @error('image')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
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
                    <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Nama Pesantren</label>
                    <div class="col-md-6">
                        <select name="namaPesantren" id="namaPesantren" class="form-control @error('namaPesantren') is-invalid @enderror">
                            <option value="">== Pilih Nama Unit Pesantren ==</option>
                            @foreach($datapesantren as $dp)
                            <option value="{{ $dp->id }}" {{ old('namaPesantren', $data->id) == $dp->id ? 'selected' : null }}>{{ $dp->nama_pesantren }}</option>
                            @endforeach
                        </select>
                        @error('namaPesantren')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
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
