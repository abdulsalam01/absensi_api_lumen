<?php

namespace App\Http\Controllers;

use App\Messages;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
      return view('admin.index');
    }

    public function showMahasiswa() {
      return view('admin.list_mahasiswa');
    }

    public function showMataKuliah() {
      return view('admin.list_matakuliah');
    }

    public function showDetailJadwal() {
      return view('admin.list_detil_jadwal');
    }

    public function showRekapKehadiran() {
      $message = new Messages();

      return view('admin.list_rekap_kehadiran')->with('translate', $message);
    }
    //
}
