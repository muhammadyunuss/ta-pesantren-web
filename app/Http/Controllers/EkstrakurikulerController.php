<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryBuilder = DB::table('ekstrakurikuler')
        ->join("santri","ekstrakurikuler.id","=","santri.id")->get();

    return view('ekstrakurikuler.index', ['data' => $queryBuilder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datasantri = Santri::all();
        return view('ekstrakurikuler.addekstrakurikuler', compact('datasantri'));
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
            'namaEkskul' => 'required',
            'keterangan' => 'required',
            'namaSantri' => 'required',
        ], [
            'namaEkskul.required' => 'Nama Ekstrakurikuler Santri tidak boleh kosong',
            'keterangan.required' => 'Keterangan deskripsi ekstrakurikuler santri tidak boleh kosong',
            'namaSantri.required' => 'Nama santri harus dipilih',
        ]);
        $data = new Ekstrakurikuler();
        $data->nama_ekstrakurikuler = $request->get('namaEkskul');
        $data->keterangan_ekstrakurikuler = $request->get('keterangan');
        $data->santri_id_santri = $request->get('namaSantri');
        $data->save();
        return redirect()->route('ekstrakurikuler.index')->with('status','Data Ekstrakurikuler Santri berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        $data = $ekstrakurikuler;
        $datasantri = Santri::all();
        return view('ekstrakurikuler/editekstrakurikuler',compact('data', 'datasantri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'namaEkskul' => 'required',
            'keterangan' => 'required',
            'namaSantri' => 'required',
        ], [
            'namaEkskul.required' => 'Nama Ekstrakurikuler Santri tidak boleh kosong',
            'keterangan.required' => 'Keterangan deskripsi ekstrakurikuler santri tidak boleh kosong',
            'namaSantri.required' => 'Nama santri harus dipilih',
        ]);
        $ekstrakurikuler->nama_ekstrakurikuler = $request->get('namaEkskul');
        $ekstrakurikuler->keterangan_ekstrakurikuler = $request->get('keterangan');
        $ekstrakurikuler->santri_id_santri = $request->get('namaSantri');
        $ekstrakurikuler->save();
        return redirect()->route('ekstrakurikuler.index')->with('status','Data Ekstrakurikuler Santri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return redirect()->route('ekstrakurikuler.index')->with('statushapus', 'Data ekstrakurikuler santri berhasil dihapus');
    }
}
