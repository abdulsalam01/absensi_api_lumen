<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalDetil extends Model
{
    //
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'detil_jadwal';
    protected $primaryKey = 'kd_detil';
    //
    protected $fillable = ['kd_detil', 'npm', 'kode_mk', 'hari', 'jam', 'ruang'];
    protected $hidden = [];

    public function users() {
        return $this->belongsTo('App\Mahasiswa', 'npm', 'npm');
    }

    public function matkul() {
      return $this->belongsTo('App\MataKuliah', 'kode_mk', 'kode_mk');
    }

    public function kehadiran() {
      return $this->hasMany('App\RekapKehadiran', 'kd_detil', 'kd_detil');
    }
}
