<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroadcastNotifikasi extends Model
{
    use HasFactory;

    protected $table = 'broadcast_notifikasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pesantren_id',
        'walisantri_id',
        'judul',
        'isi',
      ];
}
