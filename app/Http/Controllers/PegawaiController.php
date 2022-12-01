<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pesantren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryBuilder = DB::table('pegawai')
        ->join("pesantren","pegawai.id","=","pesantren.id")->get();

    return view('pegawai.index', ['data' => $queryBuilder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapesantren = Pesantren::all();
        return view('pegawai.addpegawai', compact('datapesantren'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'kontakPegawai' => 'required',
            'image' => 'required',
            'tanggalPegawai' => 'required', //max 10mb (10240kb)
            'namaPesantren' => 'required',

        ], [
            'namaPegawai.required' => 'Nama Pegawai tidak boleh kosong',
            'alamatPegawai.required' => 'Alamat Pegawai harus diisi',
            'kontakPegawai.required' => 'Kontak Pegawai harus diisi',
            'image.required' => 'Foto pegawai tidak boleh kosong',
            'tanggalPegawai.required' => 'Tanggal Lahir Pegawai tidak boleh kosong',
            'namaPesantren.required' => 'Nama Pesantren tidak boleh kosong',

        ]);

        $data = new Pegawai();

        $data->nama_pegawai = $request->get('namaPegawai');
        $data->alamat_pegawai = $request->get('alamatPegawai');
        $data->kontak_pegawai = $request->get('kontakPegawai');
        $data->foto_pegawai = $request->get('image');
        $data->tanggal_lahir_pegawai=$request->get('tanggalPegawai');
        $data->pesantren_id = $request->get('namaPesantren');
        $data->save();


        return redirect()->route('pegawai.index')->with('status','Data Pegawai berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $data = $pegawai;
        $datapesantren = Pesantren::all();
        return view('pegawai/editpegawai',compact('data', 'datapesantren'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'namaPegawai' => 'required',
            'alamatPegawai' => 'required',
            'kontakPegawai' => 'required',
            'image' => 'required',
            'tanggalPegawai' => 'required', //max 10mb (10240kb)
            'namaPesantren' => 'required',

        ], [
            'namaPegawai.required' => 'Nama Pegawai tidak boleh kosong',
            'alamatPegawai.required' => 'Alamat Pegawai harus diisi',
            'kontakPegawai.required' => 'Kontak Pegawai harus diisi',
            'image.required' => 'Foto pegawai tidak boleh kosong',
            'tanggalPegawai.required' => 'Tanggal Lahir Pegawai tidak boleh kosong',
            'namaPesantren.required' => 'Nama Pesantren tidak boleh kosong',

        ]);

        $pegawai->nama_pegawai = $request->get('namaPegawai');
        $pegawai->alamat_pegawai = $request->get('alamatPegawai');
        $pegawai->kontak_pegawai = $request->get('kontakPegawai');
        $pegawai->foto_pegawai = $request->get('image');
        $pegawai->tanggal_lahir_pegawai=$request->get('tanggalPegawai');
        $pegawai->pesantren_id = $request->get('namaPesantren');
        dd($request);
        $pegawai->save();


        return redirect()->route('pegawai.index')->with('status','Data Pegawai berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('statushapus', 'Data Pegawai berhasil dihapus');
    }
}
