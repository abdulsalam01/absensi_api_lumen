<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $user;

    public function __construct(UsersRepository $interface)
    {
      $this->user = $interface;
    }

    public function auth(Request $request) {
      $data = array(
        'npm' => $request->input('npm'),
        'sandi' => $request->input('sandi'));

      return $this->user->login($data);
    }

    public function insert(Request $request) {
      $data = array(
        'npm' => $request->input('npm'),
        'nama' => $request->input('nama'),
        'alamat' => $request->input('alamat'),
        'tgllahir' => $request->input('tgllahir'),
        'sandi' => $request->input('sandi'),
        'email' => $request->input('email')
      );

      return $this->user->create($data);
    }

    public function update(Request $request, $id) {
      $data = array(
        'nama' => $request->input('nama'),
        'alamat' => $request->input('alamat'),
        'tgllahir' => $request->input('tgllahir'),
        'sandi' => $request->input('sandi'),
        'email' => $request->input('email')
      );

      return $this->user->update($data, $id);
    }

    public function delete($id) {
      return $this->user->delete($id);
    }

    public function getAll() {
      return $this->user->read();
    }

    public function getById($id) {
      return $this->user->readById($id);
    }

}
