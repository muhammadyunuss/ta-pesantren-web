@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Tambah Data Santri
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('santri.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label for="image">Gambar Santri</label>
                        <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" placeholder="Isikan gambar Anda">
                        @error('image')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="nisSantri">NIS Santri</label>
                        <input type="number" class="form-control @error('nisSantri') is-invalid @enderror" name="nisSantri" value="{{ old('nisSantri') }}" placeholder="Isikan Nomor NIS Santri">
                        @error('nisSantri')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="namaSantri">Nama Santri</label>
                        <input type="text" class="form-control @error('namaSantri') is-invalid @enderror" name="namaSantri" value="{{ old('namaSantri') }}" placeholder="Isikan nama Santri">
                        @error('namaSantri')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="tanggalSantri">Tanggal Lahir Santri</label>
                        <input type="date" class="form-control @error('tanggalSantri') is-invalid @enderror" name="tanggalSantri" value="{{ old('tanggalSantri') }}" placeholder="Isikan Tanggal Lahir Santri">
                        @error('tanggalSantri')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="alamatSantri">Alamat Santri</label>
                        <textarea class="form-control @error('alamatSantri') is-invalid @enderror" name="alamatSantri" placeholder="Isikan deskripsi Alamat Santri" rows="3">{{ old('alamatSantri') }}</textarea>
                        @error('alamatSantri')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="namaAyah">Nama Ayah</label>
                        <input type="text" class="form-control @error('namaAyah') is-invalid @enderror" name="namaAyah" value="{{ old('namaAyah') }}" placeholder="Isikan Nama Ayah" min="0">
                        @error('namaAyah')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="namaIbu">Nama Ibu</label>
                        <input type="text" class="form-control @error('namaIbu') is-invalid @enderror" name="namaIbu" value="{{ old('namaIbu') }}" placeholder="Isikan Nama Ibu" min="0">
                        @error('namaIbu')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="asrama">Gedung Asrama Santri</label>
                        <input type="text" class="form-control @error('asrama') is-invalid @enderror" name="asrama" value="{{ old('asrama') }}" placeholder="Isikan Nama Gedung Asrama Santri" min="0">
                        @error('asrama')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="kamar">Nama Kamar Santri</label>
                        <input type="text" class="form-control @error('kamar') is-invalid @enderror" name="kamar" value="{{ old('kamar') }}" placeholder="Isikan Nama Kamar Santri" min="0">
                        @error('kamar')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="statusAktif">Status Aktif</label> <br>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="statusAktif" id="statusAktif" value="yes" checked="checked">
                            <label for="aktif" class="form-check-label"> Aktif </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="statusAktif" id="statusAktif" value="Tidak">
                            <label for="tidak" class="form-check-label"> Tidak Aktif </label>
                        </div>
                    </div><br>
                    <br>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
