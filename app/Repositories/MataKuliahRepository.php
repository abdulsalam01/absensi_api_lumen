<?php
    namespace App\Repositories;
    //
    use App\Interfaces\GlobalInterface;
    use App\MataKuliah;
    // message helper
    use App\Messages;

    class MataKuliahRepository implements GlobalInterface {
        //
        private $message;

        public function __construct() {
            $this->message = new Messages();
        }

        public function counts() {
            $mata_kuliah = new MataKuliah();

            return $mata_kuliah->count();
        }

        public function create($data) {
            $mata_kuliah = new MataKuliah();

            $mata_kuliah->mata_kuliah = $data['mata_kuliah'];
            $mata_kuliah->sks = $data['sks'];
            $mata_kuliah->keterangan = $data['keterangan'];

            $mata_kuliah->save();
            return response()->json($this->message->afterInsert());
        }

        public function read() {
            $mata_kuliah = new MataKuliah();

            return response()->json($mata_kuliah::all());
        }

        public function readById($id) {
            $mata_kuliah = new MataKuliah();

            return response()->json($mata_kuliah->find($id));
        }

        public function update($data, $id) {
            $mata_kuliah = new MataKuliah();

            //
            $mata_kuliah = $mata_kuliah->find($id);

            $mata_kuliah->mata_kuliah = $data['mata_kuliah'];
            $mata_kuliah->sks = $data['sks'];
            $mata_kuliah->keterangan = $data['keterangan'];

            $mata_kuliah->save();
            return response()->json($this->message->afterUpdate());
        }

        public function delete($id) {
            $mata_kuliah = new MataKuliah();

            // find by id
            $mata_kuliah = $mata_kuliah->find($id);
            $mata_kuliah->delete();

            return response()->json($this->message->afterDelete());
        }
    }

?>
