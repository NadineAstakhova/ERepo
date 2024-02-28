<?php

use Illuminate\Support\Facades\Route;
use Src\Application\Http\Controllers\CounterController;
use Src\Application\Http\Controllers\EmployeeCounterController;
use Src\Application\Http\Controllers\TeamController;

Route::post('team', [TeamController::class, 'storeAction']);
Route::delete('team/{team}', [TeamController::class, 'deleteAction']);

Route::post('counter', [CounterController::class, 'storeAction']);

Route::post('employee/{employee}/counter/{counter}', [EmployeeCounterController::class, 'incrementAction']);
