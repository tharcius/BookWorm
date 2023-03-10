<?php

use App\Http\Controllers\Author\CreateController as AuthorCreate;
use App\Http\Controllers\Author\DestroyController as AuthorDestroy;
use App\Http\Controllers\Author\IndexController as AuthorIndex;
use App\Http\Controllers\Author\ShowController as AuthorShow;
use App\Http\Controllers\Author\UpdateController as AuthorUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', AuthorIndex::class);
Route::post('/', AuthorCreate::class);
Route::get('/{authorId}', AuthorShow::class);
Route::patch('/{authorId}', AuthorUpdate::class);
Route::delete('/{authorId}', AuthorDestroy::class);
