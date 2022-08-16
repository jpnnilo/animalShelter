<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RescuerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//jquery ajax   
Route::controller(AnimalController::class)->group(function(){
    Route::get('/', 'adoptable')->name('adoptable'); //view all adoptable animals
    Route::get('animal/details/{id}', 'animalDetails')->name('animal.details'); //view animal details
    // Route::get('animal/disease/{id}', 'showDiseases');  //moved to web since API can't state authentication session
    Route::post('animal/disease/{id}', 'addDisease')->name('animal.addDisease'); //add animal diseases
    Route::post('animal/details/adopt', 'adopt')->name('animal.details.adopt'); // put/update adopter_id to animal
    Route::delete('animal/disease{id}', 'removeDisease'); // delete animal diseases
});

Route::get('/rescuer/viewAnimal', [RescuerController::class, 'viewAnimal']);
Route::post('/rescuer/addAnimal', [RescuerController::class, 'addAnimal']);
Route::delete('/rescuer/deleteAnimal', [RescuerController::class, 'deleteAnimal']);