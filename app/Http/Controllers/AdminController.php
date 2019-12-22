<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    }

    public function index() {
      return view('admin.index');
    }

    public function showMahasiswa() {
      return view('admin.list_mahasiswa');
    }

    public function createMahasiswa() {
      return view('admin.create_mahasiswa');
    }

    public function showMataKuliah() {
      return view('admin.list_matakuliah');
    }

    public function createMataKuliah() {
      return view('admin.create_matakuliah');
    }

    public function showDetailJadwal() {
      return view('admin.list_detil_jadwal');
    }

    public function createDetilJadwal() {
      return view('admin.create_detil_jadwal');
    }

    public function showRekapKehadiran() {
      return view('admin.list_rekap_kehadiran');
    }

    public function createRekapKehadiran() {
      return view('admin.create_rekap_kehadiran');
    }
    //
}
