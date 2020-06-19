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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('files', 'FilesController');

// Route::any('/search',function(){
//     $q = Input::get ( 'q' );
//     $file = File::where('name','LIKE','%'.$q.'%')->orWhere('title','LIKE','%'.$q.'%')->get();
//     if(count($file) > 0)
//         return view('files.index')->withDetails($file)->withQuery ( $q );
//     else return view('files.index')->withMessage('No Details found. Try to search again !');
// });