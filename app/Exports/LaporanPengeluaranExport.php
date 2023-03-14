<?php

namespace App\Exports;

use App\Models\JenisPembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanPengeluaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JenisPembayaran::join('pembayaran', 'pembayaran.id', 'jenis_pembayaran.pembayaran_id')
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
    }
}
