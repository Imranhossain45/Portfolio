<?php

use App\Http\Controllers\Backend\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\FrontendController;

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

/* Route::get('/', function () {
    return view('frontend.index');
});
 */


Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/service/create', 'create')->name('create');
    Route::post('/service/store', 'store')->name('store');
    Route::get('/service/edit/{service}', 'edit')->name('edit');
    Route::post('/chef/update/{service}', 'update')->name('update');
    Route::get('/service/destroy/{service}', 'destroy')->name('trash');
    Route::get('/service/status/{service}', 'status')->name('status');
    Route::get('/service/reStore/{id}', 'reStore')->name('reStore');
    Route::get('/service/permDelete/{id}', 'permDelete')->name('delete');
});

Route::middleware(['auth'])->group(
    function () {
        Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth', 'verified');

        Route::controller(ServiceController::class)->name('backend.service.')->group(function () {
            Route::get('/service', 'index')->name('index');
            Route::get('/service/create', 'create')->name('create');
            Route::post('/service/store', 'store')->name('store');
            Route::get('/service/edit/{service}', 'edit')->name('edit');
            Route::post('/chef/update/{service}', 'update')->name('update');
            Route::get('/service/destroy/{service}', 'destroy')->name('trash');
            Route::get('/service/status/{service}', 'status')->name('status');
            Route::get('/service/reStore/{id}', 'reStore')->name('reStore');
            Route::get('/service/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(MainController::class)->name('backend.main.')->group(function () {
            Route::get('/main', 'index')->name('index');
            Route::get('/main/create', 'create')->name('create');
            Route::post('/main/store', 'store')->name('store');
            Route::get('/main/edit/{main}', 'edit')->name('edit');
            Route::post('/chef/update/{main}', 'update')->name('update');
            Route::get('/main/destroy/{main}', 'destroy')->name('trash');
            Route::get('/main/status/{main}', 'status')->name('status');
            Route::get('/main/reStore/{id}', 'reStore')->name('reStore');
            Route::get('/main/permDelete/{id}', 'permDelete')->name('delete');
        });
    }
);
Auth::routes(['verify' => true]);
