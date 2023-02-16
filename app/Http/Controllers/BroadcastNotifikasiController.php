<?php

namespace App\Http\Controllers;

use App\Models\BroadcastNotifikasi;
use App\Models\Pegawai;
use App\Models\Pesantren;
use App\Models\WaliSantri;
use Illuminate\Http\Request;

class BroadcastNotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $data = BroadcastNotifikasi::leftjoin('walisantri', 'broadcast_notifikasi.walisantri_id', 'walisantri.id')
        ->where('broadcast_notifikasi.pesantren_id', $user->pesantren_id)
        ->select(
            'broadcast_notifikasi.*',
            'walisantri.nama_walisantri'
        )
        ->get();

        return view('broadcast-notifikasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $walisantri = WaliSantri::join('santri', 'walisantri.santri_id', 'santri.id')->where('santri.pesantren_id', $user->pesantren_id)
        ->select(
            'walisantri.*'
        )->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        return view('broadcast-notifikasi.create',compact('pesantren', 'walisantri'));
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

        BroadcastNotifikasi::create($data);

        if($request){
            return redirect()->route('broadcast-notifikasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('broadcast-notifikasi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BroadcastNotifikasi  $broadcastnotifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(BroadcastNotifikasi $broadcastnotifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BroadcastNotifikasi  $broadcastnotifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $walisantri = WaliSantri::join('santri', 'walisantri.santri_id', 'santri.id')->where('santri.pesantren_id', $user->pesantren_id)
        ->select(
            'walisantri.*'
        )->get();
        $data = BroadcastNotifikasi::where('id', $id)->first();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();

        return view('broadcast-notifikasi.edit',compact('data', 'walisantri', 'pesantren', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BroadcastNotifikasi  $broadcastnotifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except(['_token', '_method', 'pesantren_id']);
        BroadcastNotifikasi::where('id', $id)->update($data);

        if($request){
            return redirect()->route('broadcast-notifikasi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('broadcast-notifikasi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BroadcastNotifikasi  $broadcastnotifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BroadcastNotifikasi::where('id', $id)->delete();
        return redirect()->route('broadcast-notifikasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
