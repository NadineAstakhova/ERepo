<?php

use Illuminate\Support\Facades\Route;
use Src\Application\Http\Controllers\TeamController;

Route::post('team', [TeamController::class, 'storeAction']);
Route::delete('team/{team}', [TeamController::class, 'deleteAction']);
