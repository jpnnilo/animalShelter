<?php

use App\Models\Animal;
use App\Http\Controllers\Rescuer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\RescuerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CashDonationController;
use App\Http\Controllers\MaterialDonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', ('index'))->name('home');

// list of all rescuer
Route::get('rescuer/list', [RescuerController::class, 'index'])->name('rescuer.list'); 

// list of all adopter
Route::get('adopter/list', [AdopterController::class, 'index'])->name('adopter.list');

//list of all animal
Route::get('animal/list', [AnimalController::class, 'index'])->name('animal.list');


Route::controller(AnimalController::class)->group(function(){
    Route::get('animal/disease/{id}', 'showDiseases');  //show diseases per animal
    Route::post('animal/disease/{id}', 'addDisease')->name('animal.addDisease'); //add animal diseases
    Route::delete('animal/disease{id}', 'removeDisease'); // delete animal diseases
});

Route::resources([
    'animal' => AnimalController::class,
    'rescuer' => RescuerController::class,
    'employee' => EmployeeController::class,
    'adopter' => AdopterController::class,
    'disease' => DiseaseController::class,
    'cashdonation' => CashDonationController::class,
    'materialdonation' => MaterialDonationController::class
]);
