<?php

use Illuminate\Support\Facades\Route;
use Src\Application\Http\Controllers\CounterController;
use Src\Application\Http\Controllers\EmployeeCounterController;
use Src\Application\Http\Controllers\TeamController;
use Src\Application\Http\Controllers\TeamCounterController;

Route::post('team', [TeamController::class, 'storeAction']);
Route::delete('team/{team}', [TeamController::class, 'deleteAction']);

Route::post('counter', [CounterController::class, 'storeAction']);
Route::delete('counter/{counter}', [CounterController::class, 'deleteAction']);

Route::post('employee/{employee}/counter/{counter}', [EmployeeCounterController::class, 'incrementAction']);


Route::get('team/{team}/total/steps', [TeamCounterController::class, 'getCurrentTotalStepsForTeam']);
Route::get('team/{team}/employees/steps', [TeamCounterController::class, 'getEmployeesWithCounterFromTeam']);
Route::get('teams/counters', [TeamCounterController::class, 'getAllTeamsWithCounters']);
