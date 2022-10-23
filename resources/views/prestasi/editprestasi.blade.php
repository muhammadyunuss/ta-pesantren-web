@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Edit Data Prestasi Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('prestasi.update', $data->id) }}" enctype="multipart/form-data">
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
                    <label for="riwayatP">Riwayat Prestasi</label>
                    <input type="text" class="form-control @error('riwayatP') is-invalid @enderror" name="riwayatP" value="{{ old('riwayatP',$data->riwayat_prestasi) }}" placeholder="Isikan Nama Prestasi Santri">
                    @error('riwayatP')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="keteranganP">Keterangan Prestasi</label>
                    <textarea class="form-control @error('keteranganP') is-invalid @enderror" name="keteranganP" placeholder="Isikan deskripsi Prestasi Santri" rows="3">{{ old('keteranganP',$data->keterangan_prestasi) }}</textarea>
                    @error('keteranganP')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggalPrestasi">Tanggal Prestasi</label>
                    <input type="date" class="form-control @error('tanggalPrestasi') is-invalid @enderror" name="tanggalPrestasi" value="{{ old('tanggalPrestasi', $data->tanggal_prestasi) }}" placeholder="Isikan Tanggal Prestasi Santri">
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
