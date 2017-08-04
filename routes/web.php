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

/* Main website routes */

Route::get('/', function () {
    return view('index');
});

Route::get('/animals', function () {
    return view('animals');
});

Route::get('/animal/{id}', 'AnimalController@view');
Route::get('/animals/adopted', 'AnimalController@adopted');
Route::get('/animals/adoptable', 'AnimalController@adoptable');

Route::get('/events', 'EventController@getEvents');
Route::get('/events/{id}', 'EventController@view');

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', 'AboutController@index');

Route::get('/contact', function () {
    return view('contact-us');
});

/* Admin routes */



Route::get('/admin', function () {
    return view('admin/dashboard');
})->middleware('auth');

# animal routes
Route::get('/admin/animals', 'AdminController@animals')->middleware('auth');

Route::get('/admin/animals/add', 'AnimalController@add')->middleware('auth');

Route::post('/admin/animals/add', 'AnimalController@updateAnimal')->middleware('auth');

Route::get('/admin/animals/update/{id}', 'AnimalController@update')->middleware('auth');

Route::post('/admin/animals/update', 'AnimalController@updateAnimal')->middleware('auth');

Route::get('/admin/animals/delete/{id}', 'AnimalController@deleteAnimal')->middleware('auth');

# event routes
Route::get('/admin/events', 'AdminController@events')->middleware('auth');

Route::get('/admin/events/add', 'EventController@add')->middleware('auth');

Route::get('/admin/events/update/{id}','EventController@update')->middleware('auth');

Route::post('admin/events/update/{id}', 'EventController@updateEvent')->middleware('auth');

Route::post('admin/event/add', 'EventController@updateEvent')->middleware('auth');

# settings and users routes
Route::get('/admin/settings', 'AdminController@settings')->middleware('auth');

Route::get('/admin/users/add', function(){
    return view("admin/user-form", ["error" => null]);
})->middleware('auth');

Route::post('/admin/users/add', 'AdminController@addUser')->middleware('auth');

Route::get('/admin/users/delete/{id}', 'AdminController@deleteUser')->middleware('auth');

Route::post('/admin/stats', 'AdminController@updateStats')->middleware('auth');

Auth::routes();
