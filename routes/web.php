<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/main', function () {
//    return view('main');
//});


//Route::get('/items', [MainController::class, 'index']);
//Route::post('/items', [MainController::class, 'store'])->name('items');

Route::resource('items', MainController::class)->names('items');
