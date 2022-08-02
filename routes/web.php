<?php


use App\Models\Animal;
use App\Http\Controllers\Rescuer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\RescuerController;
use App\Http\Controllers\EmployeeController;

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

Route::resources([
    'animal' => AnimalController::class,
    'rescuer' => RescuerController::class,
    'employee' => EmployeeController::class,
    'adopter' => AdopterController::class
]); 


