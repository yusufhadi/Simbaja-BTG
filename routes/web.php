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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputPaketController;
use App\Http\Controllers\LoginAdminController;
use Illuminate\Support\Facades\Route;

// use Symfony\Component\Routing\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('admin')
//     ->namespace('Admin')
//     ->group(function () {
//         Route::get('/', 'DashboardController@index')
//             ->name('dashboard');

//         Route::resource('InputPaket', 'InputPaketController');
//     });
// Route::get('/', 'DashboardController@index')
//     ->name('dashboard');


Route::middleware('guest')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', 'LoginAdminController@index')->name('login');
        Route::post('/login', 'LoginAdminController@authenticate')->name('auth.login');
    });
});

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::post('auth/logout', 'LoginAdminController@logout')->name('auth.logout');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



    Route::get('/input-paket/create', 'InputPaketController@create')
        ->name('tambah-paket.create');

    // Route::post('/tambah-skpd', 'SkpdController@create')
    //     ->name('tambah-skpd');


    Route::get('skpd/print/{id}/{date}', 'SkpdController@print')->name('skpd.print');

    Route::middleware('administrator')->group(function () {

        Route::resource('skpd', 'skpdController');

        Route::get('/input-paket/show/{id}/edit', 'InputPaketController@edit')
            ->name('edit-paket');

        Route::PUT('/input-paket/show/{id}/edit', 'InputPaketController@update')
            ->name('edit-paket');
    });

    Route::get('/input-paket', 'InputPaketController@index')
        ->name('input-paket');

    Route::post('/tambah-paket', 'InputPaketController@store')
        ->name('tambah-paket');

    Route::get('/input-paket/show/{id}', 'InputPaketController@show')
        ->name('tampilkan-paket');

    Route::get('/input-paket/show/{id}/download', 'InputPaketController@downld')
        ->name('download-paket');

    // Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
});
