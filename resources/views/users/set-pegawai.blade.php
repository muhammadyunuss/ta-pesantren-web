@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Set Pegawai</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('users.store-set-pegawai') }}">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Nama : <b>{{ $user->name }}</b></p>
                <p>Email : <b>{{ $user->email  }}</b></p>
            </div>
            <div class="form-group">
                <label for="name">Pegawai</label>
                <input type="hidden" name="user_id" id="user_id" value="{{ $id }}">
                <select name="pegawai_id" id="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror">
                    <option value="">Pilih Pegawai</option>
                    <option value="">Bukan Pegawai</option>
                    @foreach($pegawai as $ds)
                        <option value="{{ $ds->id }}" {{ old('pegawai_id') == $ds->id ? 'selected' : null }}>{{ $ds->nama_pegawai }}</option>
                    @endforeach
                    {{-- <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : null }}>{{ $pegawai->nama_pegawai }}</option> --}}
                </select>
                @error('pegawai_id')
                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                @enderror <br>
                <div class="invalid-feedback" style="color:red">Jika Ingin Mengubah Menjadi Tidak Pegawai, Silakan Bukan Pegawai</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

@endsection
