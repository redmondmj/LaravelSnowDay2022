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

// Simplified version of above route
Route::view('/', 'welcome');

// Sample route with user defined function call
Route::get('hello', function () {
    echo 'Hello World!';
});

//Added by Auth UI Component check resulting routes with artisan
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Create and store a new vote
Route::get('/vote/create', 'App\Http\Controllers\VoteController@index')->name('vote.create');
Route::post('/vote/create', 'App\Http\Controllers\VoteController@store')->name('vote.store');

//Demo page for API
Route::get('api', function (){
    return ['name' => 'Snow-Day', 'vote_count' => ''];
});

//Display Vote Results
Route::get('/vote/show', function () {
    // TODO: Perhaps there is a more efficient way to handle this data?
    $data['votes'] = DB::table('votes')->get();
    $data['yesVotes'] = DB::table('votes')->where('vote', 1)->count('vote');
    $data['noVotes'] = DB::table('votes')->where('vote', 0)->count('vote');

    //dd($data);
    //return $votes;
    return view('vote.results', ['data' => $data]);

});

//Show individual vote
Route::get('/vote/show/{id}', function ($id) {

    $vote = DB::table('votes')->find($id);

   //dd($vote);

   return view('vote.single', ['vote' => $vote]);
});

// Add routes for User resource controller
Route::resource('/users', 'App\Http\Controllers\Admin\UserController', ['except'=>['show', 'create', 'store']]);