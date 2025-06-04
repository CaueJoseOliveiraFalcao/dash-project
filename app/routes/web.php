<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard' , [Students::class , 'show']);
