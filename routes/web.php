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
    return view('welcome');
});

Route::get('/movies', 'MovieController@index');
Route::get('/movie/{id}', 'MovieController@fetch_by_id')->name('movie_by_id');;
Route::get('/movie-create', 'MovieController@create');
Route::post('/movie-create', 'MovieController@store');


Route::get('/api/v1/movies', function() {
	$movies = \App\Movie::all();
	return json_encode( $movies->toArray() );
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
