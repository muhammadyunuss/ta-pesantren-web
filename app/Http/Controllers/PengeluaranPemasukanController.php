<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPemasukanExport;
use App\Exports\LaporanPengeluaranExport;
use App\Models\JenisPembayaran;
use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\PengeluaranPemasukan;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
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
        $data_pemasukan = JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')
        ->leftjoin('santri', 'jenis_pembayaran.santri_id', 'santri.id')
        ->whereNotNull('debet_pembayaran')
        ->select(
            'jenis_pembayaran.*',
            'pembayaran.nama_pembayaran',
            'santri.nama_santri'
        )
        ->orderBy('jenis_pembayaran.tanggal_pembayaran', 'DESC')
        ->get();

        $data_pengeluaran = JenisPembayaran::join('pembayaran', 'jenis_pembayaran.pembayaran_id', 'pembayaran.id')
        ->leftjoin('santri', 'jenis_pembayaran.santri_id', 'santri.id')
        ->whereNotNull('kredit_pembayaran')
        ->select(
            'jenis_pembayaran.*',
            'pembayaran.nama_pembayaran',
            'santri.nama_santri'
        )
        ->orderBy('jenis_pembayaran.tanggal_pembayaran', 'DESC')
        ->get();

        return view('pengeluaran-pemasukan.index', compact('data_pemasukan','data_pengeluaran', 'pesantren'));
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
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)->get();
        return view('pengeluaran-pemasukan.create-pemasukan',compact('pesantren', 'pegawai', 'pembayaran'));
    }

    public function createPengeluaran()
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)->get();
        return view('pengeluaran-pemasukan.create-pengeluaran',compact('pesantren', 'pegawai', 'pembayaran'));
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

    public function storePemasukan(Request $request)
    {
        $data = $request->all();
        $data['santri_id'] = 0;
        JenisPembayaran::create($data);

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
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)->get();
        $data = JenisPembayaran::where('id', $id)->first();

        return view('pengeluaran-pemasukan.edit',compact('data', 'pesantren', 'pegawai', 'id', 'pembayaran'));
    }

    public function editPemasukan($id)
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)->get();
        $data = JenisPembayaran::where('id', $id)->first();

        return view('pengeluaran-pemasukan.edit-pemasukan',compact('data', 'pesantren', 'pegawai', 'id', 'pembayaran'));
    }

    public function editPengeluaran($id)
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('pesantren_id', $user->pesantren_id)->get();
        $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pembayaran = Pembayaran::where('pegawai_id', $user->pegawai_id)->get();
        $data = JenisPembayaran::where('id', $id)->first();

        return view('pengeluaran-pemasukan.edit-pengeluaran',compact('data', 'pesantren', 'pegawai', 'id', 'pembayaran'));
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
        $data['santri_id'] = 0;
        JenisPembayaran::where('id', $id)->update($data);

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
    public function destroy($id)
    {
        jenisPembayaran::where('id', $id)->delete();
        return redirect()->route('pengeluaran-pemasukan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExportPemasukan()
    {
        return Excel::download(new LaporanPemasukanExport, 'laporan-pemasukan.xlsx');
    }

    public function fileExportPengeluaran()
    {
        return Excel::download(new LaporanPengeluaranExport, 'laporan-pengeluaran.xlsx');
    }

    public function fileExportPemasukanPdf()
    {
        $data = JenisPembayaran::join('pembayaran', 'pembayaran.id', 'jenis_pembayaran.pembayaran_id')
        ->whereNotNull('debet_pembayaran')
        ->select(
            'jenis_pembayaran.id',
            'jenis_pembayaran.tanggal_pembayaran',
            'pembayaran.nama_pembayaran',
            'jenis_pembayaran.keterangan_pembayaran',
            'jenis_pembayaran.debet_pembayaran',
            'jenis_pembayaran.status_pembayaran',
        )
        ->get();
        $pdf = Pdf::loadView('pdf.laporan-pemasukan', ['data' => $data]);
        return $pdf->download('laporan-pemasukan.pdf');
    }

    public function fileExportPengeluaranPdf()
    {
        $data = JenisPembayaran::join('pembayaran', 'pembayaran.id', 'jenis_pembayaran.pembayaran_id')
        ->whereNotNull('kredit_pembayaran')
        ->select(
            'jenis_pembayaran.id',
            'jenis_pembayaran.tanggal_pembayaran',
            'pembayaran.nama_pembayaran',
            'jenis_pembayaran.keterangan_pembayaran',
            'jenis_pembayaran.debet_pembayaran',
            'jenis_pembayaran.status_pembayaran',
        )
        ->get();
        $pdf = Pdf::loadView('pdf.laporan-pengeluaran', ['data' => $data]);
        return $pdf->download('laporan-pengeluaran.pdf');
    }
}
