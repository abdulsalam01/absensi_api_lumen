<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API
$router->group(['prefix' => env('prefix')], function() use ($router) {
  // mahasiswa api
  $router->group(['prefix' => 'mahasiswa'], function() use($router) {
    // get
    $router->get('/count', 'UsersController@counter');
    //
    $router->get('all', 'UsersController@getAll');
    $router->get('all/{id}', 'UsersController@getById');
    // post
    $router->post('create', 'UsersController@insert');
    $router->post('login', 'UsersController@auth');
    // put
    $router->put('modify/{id}', 'UsersController@update');
    // delete
    $router->delete('remove/{id}', 'UsersController@delete');
  });

  // mata_kuliah api
  $router->group(['prefix' => 'mata_kuliah'], function() use ($router) {
    // get
    $router->get('/count', 'MataKuliahController@counter');
    //
    $router->get('all', 'MataKuliahController@getAll');
    $router->get('all/{id}', 'MataKuliahController@getById');
    // post
    $router->post('create', 'MataKuliahController@insert');
    // put
    $router->put('modify/{id}', 'MataKuliahController@update');
    // delete
    $router->delete('remove/{id}', 'MataKuliahController@delete');
  });

  // detil_jadwal api
  $router->group(['prefix' => 'detil_jadwal'], function() use ($router) {
    // get
    $router->get('/count', 'MataKuliahController@counter');
    //
    $router->get('all', 'DetilJadwalController@getAll');
    $router->get('all/{id}', 'DetilJadwalController@getById');
    $router->get('user_schedule/{id}', 'DetilJadwalController@getByUser');
    $router->get('schedule_today/{id}', 'DetilJadwalController@getByData');
    // post
    $router->post('create', 'DetilJadwalController@insert');
    // put
    $router->put('modify/{id}', 'DetilJadwalController@update');
    // delete
    $router->delete('remove/{id}', 'DetilJadwalController@delete');
  });

  // rekap api
  $router->group(['prefix' => 'rekap_kehadiran'], function() use ($router) {
    // get
    $router->get('/count', 'RekapKehadiranController@counter');
    //
    $router->get('all', 'RekapKehadiranController@getAll');
    $router->get('all/{id}/{date}', 'RekapKehadiranController@getById');
    $router->get('presence/{id}', 'RekapKehadiranController@getByUser');
    // post
    $router->post('create', 'RekapKehadiranController@insert');
    $router->post('send', 'RekapKehadiranController@sendMail');
    $router->post('sendView', 'RekapKehadiranController@sendMailWithView');
    // put
    $router->put('modify/{id}/{date}', 'RekapKehadiranController@update');
    // delete
    $router->delete('remove/{id}/{date}', 'RekapKehadiranController@delete');
  });
});


// WEB ROUTE
$router->group(['prefix' => 'admin'], function() use($router) {
  // GET ACTION LOGIN - LOGOUT
  $router->get('/login', 'AuthController@loginPage');
  $router->get('/logout', 'AuthController@_doLogout');
  // POST ACTION LOGIN - LOGOUT
  $router->post('/login/action/', 'AuthController@_doLogin');

  //
  $router->get('/', 'AdminController@index');
  //
  $router->get('/mahasiswa/all', ['as' => 'mhs', 'uses' => 'AdminController@showMahasiswa']);
  $router->get('/mahasiswa/create', ['as' => 'mhs_c', 'uses' => 'AdminController@createMahasiswa']);
  //
  $router->get('/mata_kuliah/all', ['as' => 'mk', 'uses' => 'AdminController@showMataKuliah']);
  $router->get('/mata_kuliah/create', ['as' => 'mk_c', 'uses' => 'AdminController@createMataKuliah']);
  //
  $router->get('/detil_jadwal/all', ['as' => 'detil', 'uses' => 'AdminController@showDetailJadwal']);
  $router->get('/detil_jadwal/create', ['as' => 'detil_c', 'uses' => 'AdminController@createDetilJadwal']);
  //
  $router->get('/rekap_kehadiran/all', ['as' => 'rekap', 'uses' => 'AdminController@showRekapKehadiran']);
  $router->get('/rekap_kehadiran/create', ['as' => 'rekap_c', 'uses' => 'AdminController@createRekapKehadiran']);
});
