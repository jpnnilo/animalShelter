<?php


use App\Models\Animal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Rescuer;
use App\Http\Controllers\RescuerController;

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

Route::view('/', ('index'));

Route::resources([
    'animal' => AnimalController::class,
    'rescuer' => RescuerController::class
]); 