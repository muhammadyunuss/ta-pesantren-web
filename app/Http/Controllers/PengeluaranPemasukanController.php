<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\PengeluaranPemasukan;
use App\Models\Pesantren;
use Illuminate\Http\Request;

class PengeluaranPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $data = PengeluaranPemasukan::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')
        ->join('santri', 'jenis_pembayaran.santri_id', 'santri.id')
        ->select(
            'pembayaran.*',
            'pembayaran.nama_pembayaran',
            'santri.nama_santri'
        )
        ->get();

        return view('pengeluaran-pemasukan.index', compact('data','pesantren'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        return view('pengeluaran-pemasukan.create',compact('pesantren', 'pegawai'));
    }

    public function createPemasukan()
    {
        dd("pemasukan");
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        return view('pengeluaran-pemasukan.create-pemasukan',compact('pesantren', 'pegawai'));
    }

    public function createPengeluaran()
    {
        dd("pemasukan");

        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        return view('pengeluaran-pemasukan.create-pengeluaran',compact('pesantren', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        Pembayaran::create($data);

        if($request){
            return redirect()->route('pengeluaran-pemasukan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('pengeluaran-pemasukan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $data = Pembayaran::where('id', $id)->first();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();

        return view('pengeluaran-pemasukan.edit',compact('data', 'pesantren', 'pegawai', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except(['_token', '_method', 'pesantren_id']);
        Pembayaran::where('id', $id)->update($data);

        if($request){
            return redirect()->route('pengeluaran-pemasukan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('pengeluaran-pemasukan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        Pembayaran::where('id', $pembayaran)->delete();
        return redirect()->route('pengeluaran-pemasukan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
