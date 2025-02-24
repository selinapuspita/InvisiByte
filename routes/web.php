<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SteganografiController;

Route::post('/encode', [SteganografiController::class, 'encode']);
Route::post('/decode', [SteganografiController::class, 'decode']);

Route::get('/', function () {
    return view('index');
});
