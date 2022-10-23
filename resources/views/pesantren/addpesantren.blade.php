@extends('layouts.layout')
@section('content')
<div class="page-content">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Tambah Data Pesantren
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('pesantrens.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">

                <div class="form-group">
                    <label for="namaPesantren">Nama Pesantren</label>
                    <input type="text" class="form-control @error('namaPesantren') is-invalid @enderror" name="namaPesantren" value="{{ old('namaPesantren') }}" placeholder="Isikan Nama Pesantren">
                    @error('namaPesantren')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="alamatPesantren">Alamat Pesantren</label>
                    <textarea class="form-control @error('alamatPesantren') is-invalid @enderror" name="alamatPesantren" placeholder="Isikan Alamat Unit Pesantren" rows="3">{{ old('alamatPesantren') }}</textarea>
                    @error('alamatPesantren')
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
