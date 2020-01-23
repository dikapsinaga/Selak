<?php

Auth::routes();

Route::get('/home', function () {
  return view('home');
});

Route::group(['middleware' => ['web','auth']], function(){
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/home', function() {
    if (Auth::user()->role == 0) {
      return view('home');

    } else {
      $users['users'] = \App\User::all();
      return view('adminhome', $users);
    }
  });
});

Route::get('/', function () {
  return view('welcome');
});

Route::get('/welcome', function () {
  return view('welcome');
});


Route::get('/new', function () {
  return view('welcome1');
});


Route::get('/lapak', 'InformasiController@showLapak');
Route::get('/lapak/details/{id}', 'InformasiController@detailLapak');
Route::get('/invoice', 'InformasiController@showInvoice');


Route::post('/lapak/book/', 'InformasiController@bookLapak');
Route::get('/invoice/download', 'InformasiController@downloadInvoice');


Route::get('/adminhome/data', 'InformasiController@downloadData');


Route::get('/sendMail', 'InformasiController@sendEmail');

Route::get('/confirmation/{id}', 'InformasiController@confirmation');

