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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('/', 'welcome');

Route::get('hello', function () {
    echo 'Hello World!';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vote/create', 'App\Http\Controllers\VoteController@index')->name('vote.create');
Route::post('/vote/create', 'App\Http\Controllers\VoteController@store')->name('vote.store');

Route::get('api', function (){
    return ['name' => 'Snow-Day', 'vote_count' => ''];
});