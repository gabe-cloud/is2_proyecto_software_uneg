<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ScheduleController;
  
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
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
 
/*El metodo resource es lo mismo que llamar a los otros metodos get post etc*/
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('people', PersonController::class);
    Route::resource('professors', ProfessorController::class);
    Route::resource('coordinators', CoordinatorController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('schedules', ScheduleController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
