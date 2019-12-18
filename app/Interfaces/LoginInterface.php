<?php
  namespace App\Interfaces;

  /**
   *
   */
  interface LoginInterface
  {
    // code...
    function login($data);
    function logout();
    function genToken();
  }

?>
