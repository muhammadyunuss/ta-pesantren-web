@extends('layouts.layout')jadwal-progres

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Kelas<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kelas.index')}}">Manajemen Akademik</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kelas.index')}}">Kelas</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kelas.create')}}">Tambah Kelas</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Kelas
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
                        <label for="pesantren_idpesantren">Pesantren</label>
                        <select name="pesantren_idpesantren" id="pesantren_idpesantren" data-with="100%" class="form-control @error('pesantren_idpesantren') is-invalid @enderror">
                            <option value="{{ $pesantren->id }}">{{ $pesantren->nama_pesantren }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <div>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guru_idguru">Guru</label>
                        <select name="guru_idguru" id="guru_idguru" data-with="100%" class="form-control @error('guru_idguru') is-invalid @enderror">
                            <option value="">Pilih Guru</option>
                            @foreach ($guru as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                            @endforeach
                        </select>
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
@section('scripts')
<script type="text/javascript">

        $('#pemesanan_id').change(function(e){
            let id=$(this).val();
            $.ajax({
                url : "{{ url('/produksi/jadwal-progres/get-ajax-pemesanan-to-pemesanan-detail') }}"+"/"+id,
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    let html = '<option value=0>Pilih Pemesanan Detail</option>';
                    let i;
                    $('#detail_pemesanan_model_id').html(html);
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+'>'+data[i].nama_model+' '+data[i].nama_jenismodel+' '+data[i].banyaknya+' Pcs'+'</option>';
                    }
                    $('#detail_pemesanan_model_id').html(html);

                }
            });
            return false;
        });

</script>
@endsection
