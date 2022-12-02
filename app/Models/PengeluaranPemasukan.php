<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranPemasukan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tanggal_pembayaran',
        'status_pembayaran',
        'keterangan_pembayaran',
        'debet_pembayaran',
        'kredit_pembayaran',
        'pembayaran_id',
        'santri_id'
    ];
}
