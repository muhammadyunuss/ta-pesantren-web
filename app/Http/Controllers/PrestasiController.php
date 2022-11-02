<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryBuilder = DB::table('prestasi')
        ->join("santri","prestasi.id","=","santri.id")->get();

    return view('prestasi.index', ['data' => $queryBuilder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datasantri = Santri::all();
        return view('prestasi.addprestasi', compact('datasantri'));
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
            'keteranganP' => 'required',
            'riwayatP' => 'required',
            'tanggalPrestasi' => 'required',
            'namaSantri' => 'required',
        ], [
            'keteranganP.required' => 'Keterangan Prestasi santri tidak boleh kosong',
            'riwayatP.required' => 'Riwayat Prestasi Santri tidak boleh kosong',
            'tanggalPrestasi.required'  => 'Tanggal Prestasi Santri wajib diisi',
            'namaSantri.required' => 'Nama santri harus dipilih',
        ]);
        $data = new Prestasi();
        $data->keterangan_prestasi = $request->get('keteranganP');
        $data->riwayat_prestasi = $request->get('riwayatP');
        $data->tanggal_prestasi = $request->get('tanggalPrestasi');
        $data->santri_id_santri = $request->get('namaSantri');
        $data->save();
        return redirect()->route('prestasi.index')->with('status','Data Prestasi Santri berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        $data = $prestasi;
        $datasantri = Santri::all();
        return view('prestasi/editprestasi',compact('data', 'datasantri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'keteranganP' => 'required',
            'riwayatP' => 'required',
            'tanggalPrestasi' => 'required',
            'namaSantri' => 'required',
        ], [
            'keteranganP.required' => 'Keterangan Prestasi santri tidak boleh kosong',
            'riwayatP.required' => 'Riwayat Prestasi Santri tidak boleh kosong',
            'tanggalPrestasi.required'  => 'Tanggal Prestasi Santri wajib diisi',
            'namaSantri.required' => 'Nama santri harus dipilih',
        ]);
        $prestasi->keterangan_prestasi = $request->get('keteranganP');
        $prestasi->riwayat_prestasi = $request->get('riwayatP');
        $prestasi->tanggal_prestasi = $request->get('tanggalPrestasi');
        $prestasi->santri_id_santri = $request->get('namaSantri');
        $prestasi->save();
        return redirect()->route('prestasi.index')->with('status','Data Prestasi Santri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('statushapus', 'Data prestasi santri berhasil dihapus');
    }
}