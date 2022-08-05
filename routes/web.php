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


Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        // Route assigned name "admin.users"...
    })->name('users');
});

// list of all rescuer
Route::get('rescuer/list', [RescuerController::class, 'index'])->name('rescuer.list'); 

// list of all adopter
Route::get('adopter/list', [AdopterController::class, 'index'])->name('adopter.list');



Route::resources([
    'animal' => AnimalController::class,
    'rescuer' => RescuerController::class,
    'employee' => EmployeeController::class,
    'adopter' => AdopterController::class,
    'disease' => DiseaseController::class,
    'cashdonation' => CashDonationController::class,
    'materialdonation' => MaterialDonationController::class
]);
