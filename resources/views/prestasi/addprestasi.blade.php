@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Tambah Data Prestasi Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('prestasi.store') }}" enctype="multipart/form-data">
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
                    <label for="riwayatP">Riwayat Prestasi</label>
                    <input type="text" class="form-control @error('riwayatP') is-invalid @enderror" name="riwayatP" value="{{ old('riwayatP') }}" placeholder="Isikan Nama Prestasi Santri">
                    @error('riwayatP')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="keteranganP">Keterangan Prestasi</label>
                    <textarea class="form-control @error('keteranganP') is-invalid @enderror" name="keteranganP" placeholder="Isikan Keterangan Prestasi Santri" rows="3">{{ old('keteranganP') }}</textarea>
                    @error('keteranganP')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggalPrestasi">Tanggal Prestasi</label>
                    <input type="date" class="form-control @error('tanggalPrestasi') is-invalid @enderror" name="tanggalPrestasi" value="{{ old('tanggalPrestasi') }}" placeholder="Isikan Tanggal Prestasi Santri">
                    @error('tanggalPrestasi')
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
