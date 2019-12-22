<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Auth\Authenticatable;
  use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
  use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
  //
  use Laravel\Lumen\Auth\Authorizable;
  /**
   *
   */
  class Admin extends Model implements AuthenticatableContract, AuthorizableContract
  {
    use Authenticatable, Authorizable;
    //
    public $timestamps = false;
    //
    protected $table = 'admin';
    protected $fillable = [
        'email', 'password', 'token'
    ];
  }
?>
