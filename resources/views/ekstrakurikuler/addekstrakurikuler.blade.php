@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Tambah Data Ekstrakurikuler Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('ekstrakurikuler.store') }}" enctype="multipart/form-data">
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
                    <label for="riwayat">Nama Ekstrakurikuler</label>
                    <input type="text" class="form-control @error('namaEkskul') is-invalid @enderror" name="namaEkskul" value="{{ old('namaEkskul') }}" placeholder="Isikan Nama Ekstrakurikuler Santri">
                    @error('namaEkskul')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="keterangan">Keterangan Ekstrakurikuler</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Isikan deskripsi keterangan ekstrakurikuler Santri" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
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
