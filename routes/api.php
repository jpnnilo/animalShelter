<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;


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
    Route::get('animal/disease/{id}', 'showDiseases');  //show diseases per animal
    Route::post('animal/disease/{id}', 'addDisease')->name('animal.addDisease'); //add animal diseases
    Route::delete('animal/disease{id}', 'removeDisease'); // delete animal diseases
});