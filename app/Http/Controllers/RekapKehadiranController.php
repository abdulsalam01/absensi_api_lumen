<?php

namespace App\Http\Controllers;

use App\Repositories\RekapKehadiranRepository;
use Illuminate\Http\Request;
use App\Messages;

class RekapKehadiranController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $rekap;

    public function __construct(RekapKehadiranRepository $interface)
    {
        $this->rekap = $interface;
    }

    public function sendMail(Request $request) {
        $message = new Messages();
        $data = [$request->input('email'), $request->input('data')];
        //
        return $this->rekap->sendMail($data[0], $message->getMessage($data[1], 1));
    }

    // email with template
    public function sendMailWithView(Request $request) {
        $data = [$request->input('email'), $request->input('data')];
        //
        return $this->rekap->sendMailWithTemplate($data[0], $data[1]);
    }

    public function counter() {
        return $this->rekap->counts();
    }

    public function insert(Request $request) {
      $data = array(
        'kd_detil' => $request->input('kd_detil'),
        'hadir' => $request->input('hadir')
      );

      return $this->rekap->create($data);
    }

    public function update(Request $request, $id, $date) {
      $where = ['kode' => $id, 'tanggal' => $date];
      //
      $data = array(
        'kd_detil' => $request->input('kd_detil'),
        'hadir' => $request->input('hadir')
      );

      return $this->rekap->update($data, $where);
    }

    public function delete($id, $date) {
      $where = ['kode' => $id, 'tanggal' => $date];

      return $this->rekap->delete($where);
    }

    public function getAll() {
        return $this->rekap->read();
    }

    public function getById($id, $date) {
        $data = ['kode' => $id, 'tanggal' => $date];

        return $this->rekap->readById($data);
    }

    public function getByUser($id) {
      return $this->rekap->readByUser($id);
    }
}
