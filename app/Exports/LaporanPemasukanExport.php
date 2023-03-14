<?php

namespace App\Exports;

use App\Models\JenisPembayaran;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;

class LaporanPemasukanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return JenisPembayaran::join('pembayaran', 'pembayaran.id', 'jenis_pembayaran.pembayaran_id')
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
    }

}
