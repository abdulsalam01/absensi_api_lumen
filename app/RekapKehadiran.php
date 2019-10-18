<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RekapKehadiran extends Model
{
    //
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = ['kd_detil', 'tanggal'];
    protected $table = 'rekap_kehadiran';
    protected $dates = ['tanggal'];
    //
    protected $fillable = ['kd_detil', 'hadir', 'tanggal'];
    protected $hidden = [];

    public function detail() {
        return $this->belongsTo('App\JadwalDetil', 'kd_detil', 'kd_detil');
    }

    // overide builder-query for key composite
    protected function setKeysForSaveQuery(Builder $query) {
      $query
        ->where('kd_detil', '=', $this->getAttribute('kd_detil'))
        ->where('tanggal', '=', $this->getAttribute('tanggal'));

      return $query;
    }
}
