<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';

    protected $primarykey = 'id';

    public function kesehatan() {
        return $this->hasMany("App\Kesehatan","santri_id_santri","id");
    }
    public function prestasi() {
        return $this->hasMany("App\Prestasi","santri_id_santri","id");
    }
    public function ekstrakurikuler() {
        return $this->hasMany("App\Ekstrakurikuler","santri_id_santri","id");
    }
    public function pelanggaran() {
        return $this->hasMany("App\Pelanggaran","santri_id_santri","id");
    }
    public $timestamps = false;
}
