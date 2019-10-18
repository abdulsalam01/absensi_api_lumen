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

  public function status($code) {
      $status = ['Tidak hadir', 'Hadir', 'Izin', 'Sakit'];

      return $status[$code];
  }
}
