<?php

use App\Http\Controllers\API\ScenarioController;
use App\Http\Controllers\API\TechnologyController;
use App\Http\Controllers\API\TypeOfSystemController;
use App\Http\Controllers\API\MatlabController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
//Route::get('run-matlab', [TestingController::class, 'runMatlab']);


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

Route::group(['prefix' => 'sensors_and_gateways', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [TypeOfSystemController::class, 'index']);
    Route::post('add', [TypeOfSystemController::class, 'add']);
    Route::get('edit/{id}', [TypeOfSystemController::class, 'edit']);
    Route::post('update/{id}', [TypeOfSystemController::class, 'update']);
    Route::delete('delete/{id}', [TypeOfSystemController::class, 'delete']);
});



Route::group(['prefix' => 'testing-matlab', 'middleware' => 'auth:sanctum'], function () {
    Route::get('run-matlab', [MatlabController::class, 'runMatlab']);
    Route::get('get_data_5g_wq', [MatlabController::class, 'getData5gWQ']);
    Route::get('get_data_Lora_wq', [MatlabController::class, 'get_data_Lora_wq']);
    Route::get('get_data_NB_wq', [MatlabController::class, 'get_data_NB_wq']);
    Route::get('get_data_battery', [MatlabController::class, 'get_data_battery']);
    Route::get('get_data_cost', [MatlabController::class, 'get_data_cost']);
});
