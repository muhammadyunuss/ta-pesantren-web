<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $table = 'perizinan';

    protected $primarykey = 'id';
    public function santri() {
        return $this->belongsTo("App\Santri","santri_id");
    }
    public $timestamps = false;
}
