<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')
// ->middleware(TestMiddleware::class)
->controller(TestController::class)
->group(function(){
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'doregister')->name('register');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'dologin')->name('login');

    Route::get( '/', 'showWelcomePage')->name('home');

    Route::get( '/home/string', 'home');
    Route::get( '/properties/{id}', 'home');

});

Route::post('/cars/create', [CarsController::class, 'create'])->name('create.car');
Route::get('/cars/add', [CarsController::class, 'addForm']);
// Route::get('/cars/edit', [CarsController::class, 'editForm']);
Route::get('/cars', [CarsController::class, 'index'])->middleware(TestMiddleware::class);
Route::get('/car/{id}', [CarsController::class, 'show']);
Route::post('/car/{id}/update', [CarsController::class, 'update']);
Route::post('car/{id}/delete', [CarsController::class, 'destroy']);
Route::get('/car/{id}/restore', [CarsController::class, 'restoreCar']);

Route::resource('/properties', ResourceController::class);

Route::get('/', function(){
    $name = "Emmanuel";
    $role = "Admin";
    return view('welcome', compact('name', 'role'));
    }
);


