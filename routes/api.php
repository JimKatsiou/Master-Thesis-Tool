<?php

use App\Http\Controllers\API\ScenarioController;
use App\Http\Controllers\API\TechnologyController;
use App\Http\Controllers\API\TypeOfSystemController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'scenarios', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [ScenarioController::class, 'index']);
    Route::post('add', [ScenarioController::class, 'add']);
    Route::get('edit/{id}', [ScenarioController::class, 'edit']);
    Route::post('update/{id}', [ScenarioController::class, 'update']);
    Route::delete('delete/{id}', [ScenarioController::class, 'delete']);
});

Route::group(['prefix' => 'technologies', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [TechnologyController::class, 'index']);
    Route::post('add', [TechnologyController::class, 'add']);
    Route::get('edit/{id}', [TechnologyController::class, 'edit']);
    Route::post('update/{id}', [TechnologyController::class, 'update']);
    Route::delete('delete/{id}', [TechnologyController::class, 'delete']);
});

Route::group(['prefix' => 'type_of_systems', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [TypeOfSystemController::class, 'index']);
    Route::post('add', [TypeOfSystemController::class, 'add']);
    Route::get('edit/{id}', [TypeOfSystemController::class, 'edit']);
    Route::post('update/{id}', [TypeOfSystemController::class, 'update']);
    Route::delete('delete/{id}', [TypeOfSystemController::class, 'delete']);
});

Route::group(['prefix' => 'testing-matlab', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [TestingController::class, 'index']);
});
