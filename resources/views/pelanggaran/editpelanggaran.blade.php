@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Tambah Data Pelanggaran Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('pelanggaran.update', $data->id) }}" enctype="multipart/form-data">
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
                    <label for="riwayat">Riwayat Pelanggaran</label>
                    <input type="text" class="form-control @error('riwayat') is-invalid @enderror" name="riwayat" value="{{ old('riwayat', $data->riwayat_pelanggaran) }}" placeholder="Isikan Nama Pelanggaran Santri">
                    @error('riwayat')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="keterangan">Keterangan Pelanggaran</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Isikan deskripsi pelanggaran Santri" rows="3">{{ old('keterangan', $data->keterangan_pelanggaran) }}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="tanggalPelanggaran">Tanggal Riwayat Pelanggaran</label>
                    <input type="date" class="form-control @error('tanggalPelanggaran') is-invalid @enderror" name="tanggalPelanggaran" value="{{ old('tanggalPelanggaran', $data->tanggal_pelanggaran) }}" placeholder="Isikan Tanggal Pelanggaran Santri">
                    @error('tanggalPelanggaran')
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
