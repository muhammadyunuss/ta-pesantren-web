<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $primarykey = 'id';
    public function santri() {
        return $this->belongsTo("App\Santri","santri_id");
    }
    public $timestamps = false;
}
