<?php
  namespace App\Http\Middleware;

  use Closure;
  use App\Admin;

  /**
   *
   */
  class LoginMiddleware
  {

    function __construct()
    {
      // code...
    }

    public function handle($request, Closure $next) {
      if ($request->input('token')) {
        $check =  Admin::where('token', $request->input('token'))->first();

        if (!$check) {
          return response('token tidak valid!', 401);
        } else {
          return $next($request);
        }
        //
      } else {
        return response('Masukkan token!', 401);
      }
      //
    }
  }

?>
