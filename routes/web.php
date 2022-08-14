<?php

use App\Models\Animal;
use App\Http\Controllers\Rescuer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

//register form 
Route::get('/register', [AuthController::class, 'registerView'])->name('user.registerView');

//login form
Route::get('/login', [AuthController::class, 'loginView'])->name('user.loginView');

//register user
Route::post('/register', [AuthController::class, 'register'])->name('user.register');

Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::resources([
    'animal' => AnimalController::class,
    'rescuer' => RescuerController::class,
    'employee' => EmployeeController::class,
    'adopter' => AdopterController::class,
    'disease' => DiseaseController::class,
    'cashdonation' => CashDonationController::class,
    'materialdonation' => MaterialDonationController::class
]);
