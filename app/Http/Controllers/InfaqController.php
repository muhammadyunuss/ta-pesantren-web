<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\Pesantren;
use App\Models\Santri;
use Illuminate\Http\Request;

class InfaqController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $data = JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')
        ->where('pembayaran_id', 2)
        // ->where('pesantren_id',$user->pesantren_id)
        ->leftjoin('santri', 'jenis_pembayaran.santri_id', 'santri.id')
        ->select(
            'jenis_pembayaran.*',
            'pembayaran.nama_pembayaran',
            'santri.nama_santri'
        )
        ->get();

        return view('infaq.index', compact('data','pesantren'));
    }

    public function create()
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)
        ->where('id', 2)
        ->get();
        $santri = Santri::get();

        return view('infaq.create',compact('pesantren', 'pegawai', 'pembayaran', 'santri'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        JenisPembayaran::create($data);

        if($request){
            return redirect()->route('infaq.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('infaq.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $user = auth()->user();
        $data = JenisPembayaran::where('id', $id)->first();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();

        return view('infaq.edit',compact('data', 'pesantren', 'pegawai', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token', '_method', 'pesantren_id']);
        JenisPembayaran::where('id', $id)->update($data);

        if($request){
            return redirect()->route('infaq.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('infaq.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy(JenisPembayaran $pembayaran)
    {
        JenisPembayaran::where('id', $pembayaran)->delete();
        return redirect()->route('infaq.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
