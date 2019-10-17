<?php
    namespace App\Repositories;
    //
    use App\Interfaces\GlobalInterface;
    use App\Mahasiswa;
    // message helper
    use App\Messages;

    class UsersRepository implements GlobalInterface {
        //
        private $message;

        public function __construct() {
            $this->message = new Messages();
        }

        public function login($data) {
            $mahasiswa = new Mahasiswa();
            //
            $c = $mahasiswa->where(['npm' => $data['npm'], 'sandi' => $data['sandi']])->count();
            return response()->json($this->message->afterLogin($c));
        }

        public function create($data) {
            $mahasiswa = new Mahasiswa();

            $mahasiswa->npm = $data['npm'];
            $mahasiswa->nama = $data['nama'];
            $mahasiswa->alamat = $data['alamat'];
            $mahasiswa->tgllahir = $data['tgllahir'];
            $mahasiswa->sandi = $data['sandi'];
            $mahasiswa->email_orangtua = $data['email'];

            $mahasiswa->save();
            return response()->json($this->message->afterInsert());
        }

        public function read() {
            $mahasiswa = new Mahasiswa();

            return response()->json($mahasiswa::all());
        }

        public function readById($id) {
            $mahasiswa = new Mahasiswa();

            return response()->json($mahasiswa->find($id));
        }

        public function update($data, $id) {
            $mahasiswa = new Mahasiswa();
            // find by id
            $mahasiswa = $mahasiswa->find($id);

            $mahasiswa->nama = $data['nama'];
            $mahasiswa->alamat = $data['alamat'];
            $mahasiswa->tgllahir = $data['tgllahir'];
            $mahasiswa->sandi = $data['sandi'];
            $mahasiswa->email_orangtua = $data['email'];

            $mahasiswa->save();
            return response()->json($this->message->afterUpdate());
        }

        public function delete($id) {
          $mahasiswa = new Mahasiswa();

          // find by id
          $mahasiswa = $mahasiswa->find($id);
          $mahasiswa->delete();

          return response()->json($this->message->afterDelete());
        }
    }

?>
