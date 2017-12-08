<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
	return view('about');
});

Route::get('/service', function () {
	return view('service');
})->name('servicios');

Route::get('/contac', function () {
	return view('contac');
})->name('contacto');


Route::post('mensajes', function () {
	// enviar correo
	$data = request()->all();

  Mail::send("emails.mensajes", $data ,function ($message) use ($data) {
  	$message->from($data['email'],$data['name'])
  	->to('Email@de_prueba.com','pruebas')
	->subject($data['subject']);

  });
	// responder al usuario

 return back()->with('flash', $data['name'].',Tu mensaje a sisdo recibido ');
	//return request()->all();
})->name('mensajes');


