<?php
  namespace App\Http\Controllers;

  use App\Repositories\LoginRepository;
  use Illuminate\Http\Request;
  /**
   *
   */
  class AuthController extends Controller
  {

    protected $login;

    function __construct(LoginRepository $interface)
    {
      $this->login = $interface;
    }

    function loginPage() {
        return view('admin.login');
    }

    function _doLogin(Request $request) {
      //get input
      $data = [
        'email' => $request->input('email'),
        'password' => $request->input('password')
      ];

      return $this->login->login($data);
    }

    function _doLogout() {
      return $this->loginPage();
    }
  }

?>
