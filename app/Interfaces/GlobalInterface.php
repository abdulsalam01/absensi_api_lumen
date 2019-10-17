<?php
    namespace App\Interfaces;

    interface GlobalInterface {
        public function create($data);
        public function read();
        public function readById($id);
        public function update($data, $id);
        public function delete($id);
    }
    
?>