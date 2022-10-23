@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Ubah Data Kesehatan Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('kesehatan.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-body">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Nama Santri</label>
                    <div class="col-md-6">
                        <select name="namaSantri" id="namaSantri" class="form-control @error('namaSantri') is-invalid @enderror">
                            <option value="">== Pilih Nama Santri ==</option>
                            @foreach($datasantri as $ds)
                            <option value="{{ $ds->id }}" {{ old('namaSantri', $data->id) == $ds->id ? 'selected' : null }}>{{ $ds->nama_santri }}</option>
                            @endforeach
                        </select>
                        @error('namaSantri')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="riwayat">Riwayat Kesehatan</label>
                    <input type="text" class="form-control @error('riwayat') is-invalid @enderror" name="riwayat" value="{{ old('riwayat', $data->riwayat_kesehatan) }}" placeholder="Isikan Keluhan Penyakit Santri">
                    @error('riwayat')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="keterangan">Keterangan Kesehatan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Isikan deskripsi Alamat Santri" rows="3">{{ old('keterangan', $data->keterangan_kesehatan) }}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggalKeluhan">Tanggal Riwayat Keluhan</label>
                    <input type="date" class="form-control @error('tanggalKeluhan') is-invalid @enderror" name="tanggalKeluhan" value="{{ old('tanggalKeluhan', $data->tanggal_riwayat_kesehatan) }}" placeholder="Isikan Tanggal Riwayat Kesehatan Santri">
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
