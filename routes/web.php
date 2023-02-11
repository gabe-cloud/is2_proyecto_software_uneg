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
use App\Http\Controllers\IncriptionsController;
use App\Http\Controllers\ScoreController;
  
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
    Route::resource('people', PersonController::class);
    Route::resource('professors', ProfessorController::class);
    Route::resource('coordinators', CoordinatorController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('schedules', ScheduleController::class);
    //Rutas del controlador de inscripciones
    Route::resource('incriptions', IncriptionsController::class);
    Route::get('inscripciones/delete/{id_control}/{id_ins}', [IncriptionsController::class,'delete'])->name('inscripciones.delete');
    Route::get('inscripciones/cambio/{id_control}/{nombre_asig}/{carrera}', [IncriptionsController::class,'cambio'])->name('inscripciones.cambio');
    Route::get('inscripciones/adicionar', [IncriptionsController::class,'adicionar'])->name('inscripciones.adicion');
    Route::post('inscripciones/update-seccion', [IncriptionsController::class,'seccion_ca'])->name('inscripciones.update_seccion');
    Route::post('inscripciones/save_adicion', [IncriptionsController::class,'save_adicion'])->name('inscripciones.save_adicion');
    //Rutas de horarios
    Route::get('horarios/mi_horario', [ScheduleController::class,'horario_ins'])->name('horario.mi_horario');
    //Rutas notas
    Route::get('notas', [ScoreController::class,'index'])->name('notas.index');
    Route::get('notas/descripcion/{id}', [ScoreController::class,'ver_notas'])->name('notas.ver');
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
