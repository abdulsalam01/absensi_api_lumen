<?php
    namespace App\Repositories;
    //
    use App\Interfaces\GlobalInterface;
    use App\JadwalDetil;
    // message helper
    use App\Messages;
    // date helper
    use Carbon\Carbon;

    class DetilRepository implements GlobalInterface {
        // initiate
        private $message;

        public function __construct() {
            $this->message = new Messages();
        }

        public function counts() {
          $detil = new JadwalDetil();

          return $detil->count();
        }

        public function create($data) {
            $detil = new JadwalDetil();

            $detil->kd_detil = 'MKBM' . ($this->counts() + 1);
            $detil->npm = $data['npm'];
            $detil->kode_mk = $data['kode_mk'];
            $detil->hari = $data['hari'];
            $detil->jam = $data['jam'];
            $detil->ruang = $data['ruang'];

            $detil->save();
            return response()->json($this->message->afterInsert());
        }

        public function read() {
            $detil = new JadwalDetil();
            $queryAll = $detil::with('users')->with('matkul')->get();

            return response()->json($queryAll);
        }

        public function readById($id) {
            $detil = new JadwalDetil();
            $queryAll = $detil::with('users')->with('matkul')->find($id);

            return response()->json($queryAll);
        }

        public function readByUsers($id) {
            $detil = new JadwalDetil();
            $queryAll = $detil::with('users')->with('matkul')->where('npm', $id)->get();

            return response()->json($queryAll);
        }

        public function readByClause($id) {
            $detil = new JadwalDetil();
            $queryAll = $detil::with('users')->with('matkul')
                ->where('npm', $id)
                ->where('hari', $this->today())->get();

            return response()->json($queryAll);
        }

        public function update($data, $id) {
            $detil = new JadwalDetil();
            //
            $detil = $detil->find($id);

            $detil->npm = $data['npm'];
            $detil->kode_mk = $data['kode_mk'];
            $detil->hari = $data['hari'];
            $detil->jam = $data['jam'];
            $detil->ruang = $data['ruang'];
            
            $detil->save();
            return response()->json($this->message->afterUpdate());
        }

        public function delete($id) {
          $detil = new JadwalDetil();

          $detil = $detil->find($id);
          $detil->delete();

          return response()->json($this->message->afterDelete());
        }

        public function today() {
          $day = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');

          return $day[Carbon::now()->dayOfWeek-1];
        }
    }

?>
