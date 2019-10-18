<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    //
    public $timestamps = false;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_mk';

    //
    protected $fillable = ['kode_mk', 'mata_kuliah', 'sks', 'keterangan'];
    protected $hidden = [];

    public function detailJadwal() {
        return $this->hasMany('App\JadwalDetil', 'kode_mk', 'kode_mk');
    }
}
