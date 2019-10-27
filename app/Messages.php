<?php

namespace App;

class Messages
{
  public function afterInsert() {
    return array('message' => 'Berhasil ditambah');
  }

  public function afterDelete() {
    return array('message' => 'Berhasil dihapus');
  }

  public function afterUpdate() {
    return array('message' => 'Berhasil diperbaharui');
  }

  public function afterLogin($code) {
    if($code > 0)
      return array('message' => 'Login berhasil', 'status' => true);

    return array('message' => 'Login Gagal', 'status' => false);
  }

  public function status($code = NULL) {
      $status = ["Tidak hadir", "Hadir", "Izin", "Sakit"];
      //
      if(is_null($code)) return $status;
      // if have specific code
      return $status[$code];
  }

  public function getMessage($data, $code) {
    if($code < 1) {
      //
      $message = "Selamat Siang
      Berikut rekap kehadiran atas data:
      NPM: " .$data->detail->users->npm. "
      Nama: " .$data->detail->users->nama. "
      Status Kehadiran: " .$data->hadir;

      return $message;
    }

    $message = "Selamat Siang
    Berikut rekap kehadiran atas data:
    NPM: " .$data['detail']['users']['npm']. "
    Nama: " .$data['detail']['users']['nama']. "
    Status Kehadiran: " .$data['hadir'];

    return $message;
  }
}
