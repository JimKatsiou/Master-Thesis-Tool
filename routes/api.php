<?php

use App\Http\Controllers\API\ScenarioController;
use App\Http\Controllers\API\TechnologyController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TypeOfSystemController;
use App\Http\Controllers\API\MatlabController;
use App\Http\Controllers\API\LoraSolutionsController;
use App\Http\Controllers\API\FiveGSolutionsController;
use App\Http\Controllers\API\NbSolutionsController;
use App\Http\Controllers\API\SensorsController;
use App\Http\Controllers\API\GatewaysController;

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

    Route::get('get-technologies', [TechnologyController::class, 'getAllTechnologies']);
});

Route::group(['prefix' => 'type_of_systems', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [TypeOfSystemController::class, 'index']);
    Route::post('add', [TypeOfSystemController::class, 'add']);
    Route::get('edit/{id}', [TypeOfSystemController::class, 'edit']);
    Route::post('update/{id}', [TypeOfSystemController::class, 'update']);
    Route::delete('delete/{id}', [TypeOfSystemController::class, 'delete']);

    Route::get('get-type-of-systems', [TypeOfSystemController::class, 'getAllTypesOfSystems']);
    Route::get('get-selected-system', [TypeOfSystemController::class, 'getSelectedSystem']);
});

Route::group(['prefix' => 'sensors', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [SensorsController::class, 'index']);
    Route::post('add', [SensorsController::class, 'add']);
    Route::get('edit/{id}', [SensorsController::class, 'edit']);
    Route::post('update/{id}', [SensorsController::class, 'update']);
    Route::delete('delete/{id}', [SensorsController::class, 'delete']);
});

Route::group(['prefix' => 'gateways', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [GatewaysController::class, 'index']);
    Route::post('add', [GatewaysController::class, 'add']);
    Route::get('edit/{id}', [GatewaysController::class, 'edit']);
    Route::post('update/{id}', [GatewaysController::class, 'update']);
    Route::delete('delete/{id}', [GatewaysController::class, 'delete']);
});

Route::group(['prefix' => 'fiveGSolutions', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [FiveGSolutionsController::class, 'index']);
    Route::post('add', [FiveGSolutionsController::class, 'add']);
    Route::get('edit/{id}', [FiveGSolutionsController::class, 'edit']);
    Route::post('update/{id}', [FiveGSolutionsController::class, 'update']);
    Route::delete('delete/{id}', [FiveGSolutionsController::class, 'delete']);
});

Route::group(['prefix' => 'loraSolutions', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [LoraSolutionsController::class, 'index']);
    Route::post('add', [LoraSolutionsController::class, 'add']);
    Route::get('edit/{id}', [LoraSolutionsController::class, 'edit']);
    Route::post('update/{id}', [LoraSolutionsController::class, 'update']);
    Route::delete('delete/{id}', [LoraSolutionsController::class, 'delete']);
});

Route::group(['prefix' => 'nbSolutions', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [NbSolutionsController::class, 'index']);
    Route::post('add', [NbSolutionsController::class, 'add']);
    Route::get('edit/{id}', [NbSolutionsController::class, 'edit']);
    Route::post('update/{id}', [NbSolutionsController::class, 'update']);
    Route::delete('delete/{id}', [NbSolutionsController::class, 'delete']);
});


Route::group(['prefix' => 'testing-matlab', 'middleware' => 'auth:sanctum'], function () {
    Route::get('testing-matlab-next/:systemId', [MatlabController::class, 'runMatlab']);
    Route::get('testing-matlab-next/runMatlab', [MatlabController::class, 'runMatlab']);
    Route::post('get_data_5g_wq', [MatlabController::class, 'getData5gWQ']);
    Route::post('get_data_Lora_wq', [MatlabController::class, 'get_data_Lora_wq']);
    Route::post('get_data_NB_wq', [MatlabController::class, 'get_data_NB_wq']);
    Route::post('get_data_battery', [MatlabController::class, 'get_data_battery']);
    Route::post('get_data_cost', [MatlabController::class, 'get_data_cost']);
    Route::get('fetch-results', [MatlabController::class, 'fetch_results']);
});
