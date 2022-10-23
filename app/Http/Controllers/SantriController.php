<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use DB;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $qrSantri = DB::select(DB::raw("select * from santri"));
        return view('santri.index',['data'=>Santri::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('santri.addsantri');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // return $request->file('image')->store('imageCategories');

        //untuk validasi saat user mengisi data, apabila ada yang masih kosong dimunculkan pesan error
        $request->validate([
            'nisSantri' => 'required',
            'namaSantri' => 'required',
            'tanggalSantri' => 'required',
            'alamatSantri' => 'required',
            'image' => 'required', //max 10mb (10240kb)
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'kamar' => 'required',
            'asrama' => 'required',

        ], [
            'nisSantri.required' => 'NIS Santri tidak boleh kosong',
            'namaSantri.required' => 'Nama Santri tidak boleh kosong',
            'tanggalSantri.required' => 'Tanggal Lahir harus diisi',
            'alamatSantri.required' => 'Alamat Santri harus diisi',
            'image.required' => 'Gambar Santri tidak boleh kosong',
            'namaAyah.required' => 'Nama Ayah Santri tidak boleh kosong',
            'namaIbu.required' => 'Nama Ibu Santri tidak boleh kosong',
            'kamar.required' => 'Nama Kamar Harus Diisi',
            'asrama.required' => 'Nama Gedung Asrama harus diisi',

        ]);

        //New Kategori berarti artinya new Data Kategori (insert)
        $data = new Santri();

        //$data->[nama_kolom_pada_db] = $request->get('[name dari input text]')
        $data->nis = $request->get('nisSantri');
        $data->nama_santri = $request->get('namaSantri');
        $data->tanggal_lahir_santri = $request->get('tanggalSantri');
        $data->alamat_santri = $request->get('alamatSantri');
        // if($request->file('image')) {
        //     $data['foto_santri'] = $request->file('image')->store('imageCategories');
        // }
        $data->foto_santri=$request->get('image');
        $data->nama_ayah = $request->get('namaAyah');
        $data->nama_ibu = $request->get('namaIbu');
        $data->kamar_santri = $request->get('kamar');
        $data->asrama_santri = $request->get('asrama');
        $data->status_aktif = $request->get('statusAktif');
        $data->save();

        //akan memanggil route kategori index yang akan kembali ke halaman utama Kategori
        //dengan menambahkan session status yang isinya berhasil ditambahkan Kategori baru
        //with = membuat session sementara bernama status yg menampilkan berhasilnya ditambahkan data Kategori
        return redirect()->route('santri.index')->with('status','Data Santri berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        // $data = $santri->all();
        // $data['nama_santri'] = Str::slug($request->nama_santri);
        // // $data['foto']
        // Santri::create($data);

        //return redirect()->route('home')->with('status', 'Data Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        $data = $santri;

        return view('santri/editsantri',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
      // return $request->file('image')->store('imageCategories');

        //untuk validasi saat user mengisi data, apabila ada yang masih kosong dimunculkan pesan error
        $request->validate([
            'nisSantri' => 'required',
            'namaSantri' => 'required',
            'tanggalSantri' => 'required',
            'alamatSantri' => 'required',
            'image' => 'required', //max 10mb (10240kb)
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'kamar' => 'required',
            'asrama' => 'required',

        ], [
            'nisSantri.required' => 'NIS Santri tidak boleh kosong',
            'namaSantri.required' => 'Nama Santri tidak boleh kosong',
            'tanggalSantri.required' => 'Tanggal Lahir harus diisi',
            'alamatSantri.required' => 'Alamat Santri harus diisi',
            'image.required' => 'Gambar Santri tidak boleh kosong',
            'namaAyah.required' => 'Nama Ayah Santri tidak boleh kosong',
            'namaIbu.required' => 'Nama Ibu Santri tidak boleh kosong',
            'kamar.required' => 'Nama Kamar Harus Diisi',
            'asrama.required' => 'Nama Gedung Asrama harus diisi',


        ]);

        //New Kategori berarti artinya new Data Kategori (insert)


        //$data->[nama_kolom_pada_db] = $request->get('[name dari input text]')
        $santri->nis = $request->get('nisSantri');
        $santri->nama_santri = $request->get('namaSantri');
        $santri->tanggal_lahir_santri = $request->get('tanggalSantri');
        $santri->alamat_santri = $request->get('alamatSantri');
        // if($request->file('image')) {
        //     $data['foto_santri'] = $request->file('image')->store('imageCategories');
        // }
        $santri->foto_santri=$request->get('image');
        $santri->nama_ayah = $request->get('namaAyah');
        $santri->nama_ibu = $request->get('namaIbu');
        $santri->kamar_santri = $request->get('kamar');
        $santri->asrama_santri = $request->get('asrama');
        $santri->status_aktif = $request->get('statusAktif');
        $santri->save();

        //akan memanggil route kategori index yang akan kembali ke halaman utama Kategori
        //dengan menambahkan session status yang isinya berhasil ditambahkan Kategori baru
        //with = membuat session sementara bernama status yg menampilkan berhasilnya ditambahkan data Kategori
        return redirect()->route('santri.index')->with('status','Data Santri berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {
        // if($product->gambar_produk) { //delete file gambar
        //     Storage::delete($product->gambar_produk);
        // }
        $santri->delete();
        return redirect()->route('santri.index')->with('statushapus', 'Data Santri berhasil dihapus');
    }
}
