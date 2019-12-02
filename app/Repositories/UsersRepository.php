<?php
    namespace App\Repositories;
    //
    use App\Interfaces\GlobalInterface;
    use App\Mahasiswa;
    // message helper
    use App\Messages;
    // hash helper
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Contracts\Encryption\DecryptException;

    class UsersRepository implements GlobalInterface {
        //
        private $message;

        public function __construct() {
            $this->message = new Messages();
        }

        public function counts() {
            $mahasiswa = new Mahasiswa();

            return $mahasiswa->count();
        }

        public function login($data) {
            $mahasiswa = new Mahasiswa();
            //
            $mahasiswa = $mahasiswa->find($data['npm']);

            $c = false;
            if(!empty($mahasiswa->npm))
            	$c = Hash::check($data['sandi'], $mahasiswa->sandi);

            return response()->json($this->message->afterLogin($c));
        }

        public function create($data) {
            $mahasiswa = new Mahasiswa();

            $mahasiswa->npm = $data['npm'];
            $mahasiswa->nama = $data['nama'];
            $mahasiswa->alamat = $data['alamat'];
            $mahasiswa->tgllahir = $data['tgllahir'];
            $mahasiswa->sandi = Hash::make($data['sandi']);
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

            // encrypt password
            $password = Hash::make($data['sandi']);
            if(!empty($data['sandi'])) $mahasiswa->sandi = $password;

            $mahasiswa->nama = $data['nama'];
            $mahasiswa->alamat = $data['alamat'];
            $mahasiswa->tgllahir = $data['tgllahir'];
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
