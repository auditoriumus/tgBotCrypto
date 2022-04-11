<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::resource('lots', \App\Http\Controllers\WebSiteControllers\LotController::class)
    ->except(['show']);

Route::resource('files', \App\Http\Controllers\WebSiteControllers\FileController::class)
    ->except(['show']);

Route::get('/getfile/{id}', [\App\Http\Controllers\WebSiteControllers\FileController::class, 'getFile'])->name('getFile');

Route::resource('filetype', \App\Http\Controllers\WebSiteControllers\FileTypesController::class);