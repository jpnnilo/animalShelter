<?php


use App\Models\Animal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

Route::get('/', function () {
    return view('welcome');
});


//Add animal information
Route::get('/animal/create', [AnimalController::class,'create']);

//show all animal information
Route::get('/animal', [AnimalController::class,'index']);

//show animal update form 
Route::get('/animal/{id}', [AnimalController::class, 'edit']);

//update animal information
Route::put('/animal/{id}' , [AnimalController::class,'update']);

// show add form
Route::get('animal/add', [AnimalController::class,' create']);

//store animal information
Route::post('/animal/store', [AnimalController::class, 'store']);


//delete animal information
Route::delete('/animal/delete/{id}', [AnimalController::class, 'destroy']);
