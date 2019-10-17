<?php

namespace App\Http\Controllers;

use App\Repositories\MataKuliahRepository;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $matkul;

    public function __construct(MataKuliahRepository $interface)
    {
      $this->matkul = $interface;
    }

    public function insert(Request $request) {
      $data = array(
        'mata_kuliah' => $request->input('mata_kuliah'),
        'keterangan' => $request->input('keterangan'));

      return $this->matkul->create($data);
    }

    public function update(Request $request, $id) {
      $data = array(
        'mata_kuliah' => $request->input('mata_kuliah'),
        'keterangan' => $request->input('keterangan'));

      return $this->matkul->update($data, $id);      
    }

    public function delete($id) {
      return $this->matkul->delete($id);
    }

    public function getAll() {
      return $this->matkul->read();
    }

    public function getById($id) {
      return $this->matkul->readById($id);
    }

}
