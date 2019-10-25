<?php
    namespace App\Repositories;
    //
    use App\Interfaces\GlobalInterface;
    use App\RekapKehadiran;
    // message helper
    use App\Messages;

    class RekapKehadiranRepository implements GlobalInterface {
        //
        private $message;

        public function __construct() {
            $this->message = new Messages();
        }

        public function counts() {
            $rekap = new RekapKehadiran();

            return $rekap->count();
        }

        public function create($data) {
            $rekap = new RekapKehadiran();

            $rekap->kd_detil = $data['kd_detil'];
            $rekap->hadir = $data['hadir'];
            // tanggal is timestamp

            $rekap->save();
            return response()->json($this->message->afterInsert());
        }

        public function read() {
            $rekap = new RekapKehadiran();
            //
            $queryAll = $rekap::with(['detail' => function($query) {
              $query->with('users')->with('matkul');
            }])->get();

            // convert to code of kehadiran
            $status = $this->getStatus($queryAll);
            //
            return response()->json($status);
        }

        public function readById($id) {
            $rekap = new RekapKehadiran();

            $queryAll = $rekap::with(['detail' => function($query) {
              $query->with(['users', 'matkul']);
            }])->where('kd_detil', $id['kode'])
               ->whereDate('tanggal', $id['tanggal'])->get();

            $status = $this->getStatus($queryAll);
            //
            return response()->json($status);
        }

        public function readByUser($id) {
            $rekap = new RekapKehadiran();

            $queryAll = $rekap::with(['detail' => function($query) use($id) {
              $query->with(['users', 'matkul'])->where('npm', '=', $id);
            }])->get();

            $status = $this->getStatus($queryAll);
            //
            return response()->json($status);
        }

        public function update($data, $id) {
            $rekap = new RekapKehadiran();

            // find by id and update
            $rekap = $rekap->where([
              ['kd_detil', '=', $id['kode']],
              ['tanggal', '=', urldecode($id['tanggal'])]
            ])->update(['kd_detil' => $data['kd_detil'],
                        'hadir' => $data['hadir']]);
            //tanggal is timestamp

            return response()->json($this->message->afterUpdate());
        }

        public function delete($id) {
            $rekap = new RekapKehadiran();

            // find by id and remove
            $rekap = $rekap->where([
              ['kd_detil', '=', $id['kode']],
              ['tanggal', '=', urldecode($id['tanggal'])]
            ])->delete();

            //
            return response()->json($this->message->afterDelete());
        }

        // keep status in array of message
        public function getStatus($arr) {
            foreach ($arr as $value) {
              $value->hadir = $this->message->status($value->hadir);
            }

            return $arr;
        }
    }

?>
