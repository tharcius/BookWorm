<?php

use App\Http\Controllers\User\CreateController as UserCreate;
use App\Http\Controllers\User\DestroyController as UserDestroy;
use App\Http\Controllers\User\IndexController as UserIndex;
use App\Http\Controllers\User\ShowController as UserShow;
use App\Http\Controllers\User\UpdateController as UserUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', UserIndex::class);
Route::post('/', UserCreate::class);
Route::get('/{userId}', UserShow::class);
Route::patch('/{userId}', UserUpdate::class);
Route::delete('/{userId}', UserDestroy::class);
