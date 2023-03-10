<?php

use App\Http\Controllers\Book\CreateController as BookCreate;
use App\Http\Controllers\Book\DestroyController as BookDestroy;
use App\Http\Controllers\Book\IndexController as BookIndex;
use App\Http\Controllers\Book\ShowController as BookShow;
use App\Http\Controllers\Book\UpdateController as BookUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', BookIndex::class);
Route::post('/', BookCreate::class);
Route::get('/{bookId}', BookShow::class);
Route::patch('/{bookId}', BookUpdate::class);
Route::delete('/{bookId}', BookDestroy::class);
