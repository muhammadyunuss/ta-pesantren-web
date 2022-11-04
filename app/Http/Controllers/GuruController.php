<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = $request->id;
        $data = DB::table('guru');
        // ->join('bahan_baku','guru.bahan_baku_id','bahan_baku.id');
        // if($id){
        //     $data->where('guru.detail_pemesanan_model_id', $id);
        // }
        // ->join('detail_pemesanan_model', 'guru.detail_pemesanan_model_id', 'detail_pemesanan_model.id')
        $data = $data->select(
            'guru.*',
            // 'bahan_baku.nama_bahanbaku',
            // 'bahan_baku.stok',
            // 'bahan_baku.satuan'
        )
        ->get();
        return view('guru.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $getPesantren = DB::table('pesantren')
        ->where('id', $user->pesantren_id)
        ->first();
        return view('guru.create', compact('getPesantren'));
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
            'foto_guru' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($image = $request->file('foto_guru')) {
            $destinationPath = 'image_upload/foto_guru/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_guru'] = "$profileImage";
        }

        Guru::create($data);

        return redirect()->route('guru.index')->with('status','Data model Anda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        // dd($guru);
        $data = Guru::join('pesantren', 'guru.pesantren_idpesantren','pesantren.id')
        ->where('guru.id', $guru->id)
        ->select(
            'guru.*',
            'pesantren.nama_pesantren'
        )
        ->first();
        // dd($data);
        return view('guru.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'foto_guru' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = request()->except(['_token', '_method']);

        if ($image = $request->file('foto_guru')) {
            $destinationPath = 'image_upload/foto_guru/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_guru'] = "$profileImage";
        }
        else{
            unset($data['foto_guru']);
        }

        Guru::where('id', $guru->id)->update($data);
        return redirect()->route('guru.index')->with('status','Data model Anda berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
