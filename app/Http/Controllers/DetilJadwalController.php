<?php

namespace App\Http\Controllers;

use App\Repositories\DetilRepository;
use Illuminate\Http\Request;

class DetilJadwalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $detil;

    public function __construct(DetilRepository $interface)
    {
        $this->detil = $interface;
    }

    public function insert(Request $request) {
      $data = array(
        'npm' => $request->input('npm'),
        'kode_mk' => $request->input('kode_mk'),
        'hari' => $request->input('hari'),
        'jam' => $request->input('jam')
      );

      return $this->detil->create($data);
    }

    public function update(Request $request, $id) {
      $data = array(
        'npm' => $request->input('npm'),
        'kode_mk' => $request->input('kode_mk'),
        'hari' => $request->input('hari'),
        'jam' => $request->input('jam')
      );

      return $this->detil->update($data, $id);
    }

    public function delete($id) {
      return $this->detil->delete($id);
    }

    public function getAll() {
        return $this->detil->read();
    }

    public function getById($id) {
        return $this->detil->readById($id);
    }

    public function getByUser($id) {
      return $this->detil->readByUsers($id);
    }

    public function getByData($id) {
        return $this->detil->readByClause($id);
    }
}
