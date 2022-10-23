@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Tambah Data Kesehatan Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('kesehatan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Nama Santri</label>
                    <div class="col-md-6">
                        <select name="namaSantri" id="namaSantri" class="form-control @error('namaSantri') is-invalid @enderror">
                            <option value="">== Pilih Nama Santri ==</option>
                            @foreach($datasantri as $ds)
                            <option value="{{ $ds->id }}" {{ old('namaSantri') == $ds->id ? 'selected' : null }}>{{ $ds->nama_santri }}</option>
                            @endforeach
                        </select>
                        @error('namaSantri')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="riwayat">Riwayat Kesehatan</label>
                    <input type="text" class="form-control @error('riwayat') is-invalid @enderror" name="riwayat" value="{{ old('riwayat') }}" placeholder="Isikan Keluhan Penyakit Santri">
                    @error('riwayat')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="keterangan">Keterangan Kesehatan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Isikan deskripsi keterangan kesehatan Santri" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggalKeluhan">Tanggal Riwayat Keluhan</label>
                    <input type="date" class="form-control @error('tanggalKeluhan') is-invalid @enderror" name="tanggalKeluhan" value="{{ old('tanggalKeluhan') }}" placeholder="Isikan Tanggal Riwayat Sakit Santri">
                    @error('tanggalKeluhan')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
