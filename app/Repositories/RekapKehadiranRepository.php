<?php
    namespace App\Repositories;
    //
    use App\Interfaces\GlobalInterface;
    use App\RekapKehadiran;
    // message helper
    use App\Messages;
    // mail helper
    use Illuminate\Support\Facades\Mail;
    // date helper
    use Carbon\Carbon;

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
            $rekap->tanggal = Carbon::now();

            $rekap->save();

            // get data detail of rekap by previous inserted data
            $query = $this->readById(['kode' => $rekap->kd_detil, 'tanggal' => $rekap->tanggal]);
            // send email to parent of student
            // $this->sendMail($query->original[0]->detail->users->email_orangtua, $this->message->getMessage($query->original[0], 0));
            $this->sendMailWithTemplate($query->original[0]->detail->users->email_orangtua, $query->original[0]);

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
                        'hadir' => $data['hadir'],
                        'tanggal' => Carbon::now()]);

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

        // send email
        public function sendMail($to, $body) {

          Mail::raw($body, function($message) use($to) {
            $message->from('gridcomputing100@gmail.com', 'Administrator');
            $message->to($to, 'Absensi GPS Member')->subject('Status Kehadiran ' . Carbon::now());
          });

          return response()->json("Email Sent. Check your inbox.");
        }

        // experimental email with template
        public function sendMailWithTemplate($to, $body) {
          //get data into array
          $data = array(
            'kd_detil' => $body['kd_detil'],
            'hadir' => $body['hadir'],
            'tanggal' => $body['tanggal'],
            'npm' => $body['detail']['users']['npm'],
            'nama' => $body['detail']['users']['nama'],
            'matkul' => $body['detail']['matkul']['mata_kuliah'],
          );

          Mail::send('admin.template.email', ['body' => $data], function($message) use($to) {
            $message->from('gerobakapp@gmail.com', 'Administrator');
            $message->to($to, 'Absensi GPS Member')->subject('Status Kehadiran ' . Carbon::now());
          });

          return response()->json("Email Sent. Check your inbox.");
        }
    }

?>
