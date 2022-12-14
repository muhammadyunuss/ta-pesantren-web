<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\Notifikasi;
use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\Pesantren;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use App\Notifications\NewSppNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SppController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $data = JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')
        ->where('pembayaran_id', 3)
        // ->where('pesantren_id',$user->pesantren_id)
        ->leftjoin('santri', 'jenis_pembayaran.santri_id', 'santri.id')
        ->select(
            'jenis_pembayaran.*',
            'pembayaran.nama_pembayaran',
            'santri.nama_santri'
        )
        ->get();

        return view('spp.index', compact('data','pesantren'));
    }

    public function create()
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)
        ->where('id', 3)
        ->get();
        $santri = Santri::get();

        return view('spp.create',compact('pesantren', 'pegawai', 'pembayaran', 'santri'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if(!$request->notifikasi){
            // dd("Notifikasi Tidak Ada");
            JenisPembayaran::create($request->except(['notifikasi']));
        }else{
            // dd("Notifikasi Ada");
            $walisantri = WaliSantri::where('santri_id', $request->santri_id)->first();
            // dd($walisantri);
            // $detail_pemberitahuan = "Tagihan Pembayaran SPP, Atas nama Santri ".$walisantri->nama_walisantri." Sebesar Rp. ".number_format($request->debet_pembayaran ,2,',','.')." pada Tanggal ".date("d-m-Y", strtotime($request->tanggal_pembayaran));
            // dd($detail_pemberitahuan);
            $createnotif = Notifikasi::create([
                'walisantri_id' => $walisantri->id,
                'email_username' => $walisantri->email_walisantri,
                'judul_pemberitahuan' => 'Tagihan Pembayaran SPP',
                'detail_pemberitahuan' => "Tagihan Pembayaran SPP, Atas nama Santri ".$walisantri->nama_walisantri." Sebesar Rp. ".number_format($request->debet_pembayaran ,2,',','.')." pada Tanggal ".date("d-m-Y", strtotime($request->tanggal_pembayaran)),
                'tanggal_pemberitahuan' => $request->tanggal_pembayaran,
                'status_terbaca' => 0
            ]);


            $user = User::whereHas('roles', function ($query) {
                $query->where('id', 2);
            })->get();

            Notification::send($user, new NewSppNotification($createnotif));
            JenisPembayaran::create($request->except(['notifikasi']));
        }

        if($request){
            return redirect()->route('spp.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('spp.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $user = auth()->user();
        $data = JenisPembayaran::where('id', $id)->first();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();

        return view('spp.edit',compact('data', 'pesantren', 'pegawai', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token', '_method', 'pesantren_id']);
        JenisPembayaran::where('id', $id)->update($data);

        if($request){
            return redirect()->route('spp.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('spp.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy(JenisPembayaran $pembayaran)
    {
        JenisPembayaran::where('id', $pembayaran)->delete();
        return redirect()->route('spp.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
