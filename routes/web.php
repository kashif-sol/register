<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'verify.shopify'], function () {

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('register-data',[RegisterController::class,'index'])->name('register.data');
Route::get('register-edit',[RegisterController::class,'edit'])->name('register.edit');
Route::post('register-update', [RegisterController::class,'updateregister'])->name('register.update');

Route::post('save-form', [FormController::class,'saveForm'])->name('form.save');
Route::get('form-data',[FormController::class,'index'])->name('form.data');
Route::delete('/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');

});
Route::get('/create-table', [FormController::class,'operate']);

