<?php
  namespace App\Repositories;
  //
  use Illuminate\Support\Facades\Hash;
  //
  use App\Interfaces\LoginInterface;
  use App\Admin;
  /**
   *
   */
  class LoginRepository implements LoginInterface
  {

    function __construct() {
      // code...
    }

    function login($data) {
      $admin = new Admin();

      //get input
      $email = $data['email'];
      $password = $data['password'];
      //
      $admin = $admin::where("email", $email)->first();

      //failed / not found
      if(!$admin) {
        $out = [
          "message" => "login failed",
          "code"    => 401,
          "result"  => ["token" => null]
        ];

        //return failed
        return response()->json($out, $out['code']);
      }

      //found and passed
      if(Hash::check($password, $admin->password)) {
        $token = $this->genToken();

        //update admin $token
        $admin->update(['token' => $token]);

        $out = [
          "message" => "login success",
          "code"    => 200,
          "result"  => [ "token" => $token, ]
        ];

        //return success
        return response()->json($out, $out['code']);

        //redirect page
        // return redirect('/admin?token=' . $token);
      }

      //if password failed
      $out = [
        "message" => "login failed",
        "code"    => 401,
        "result"  => [ "token" => null,]
      ];

      //return failed
      return response()->json($out, $out['code']);
    }

    function logout() {
      //
    }

    function genToken() {
      $chars = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $len_char = strlen($chars);
      $str = '';

      for ($i = 0; $i < 80; $i++) {
        $str .= $chars[rand(0, $len_char - 1)];
      }

      return $str;
    }
    //
  }

?>
