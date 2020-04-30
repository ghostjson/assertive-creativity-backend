<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
});

//Pages section

Route::get('/pages/home', function () {
    return view('pages.home');
});

Route::get('/pages/about', function () {
    return view('pages.about');
});


// Forms Section

Route::get('/form/forms', function(){
    return view('form.forms');
});


Route::get('/form/form-creator', function(){
    return view('form.form-creator');
});

Route::get('/form/form-view', function(){
    return view('form.form-view');
});


//api section NON PROPER WAY
Route::post('/api/form/save', 'FormController@save');



