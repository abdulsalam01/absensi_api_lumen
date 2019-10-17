<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // 
    public $timestamps = false;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    
    // 
    protected $fillable = ['npm', 'nama', 'alamat', 'tgllahir', 'sandi', 'email_orangtua'];
    protected $hidden = [];

    public function detailJadwal() {
        return $this->hasMany('App\JadwalDetil', 'npm', 'npm');
    }
}
