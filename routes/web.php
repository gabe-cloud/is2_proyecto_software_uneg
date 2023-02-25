<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfessorScoringController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\IncriptionsController;
  
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
    Route::resource('students', StudentController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('scores', ScoreController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('semesters', SemesterController::class);
    Route::resource('course-scores', ProfessorScoringController::class);
   
    //Rutas del controlador de inscripciones
    Route::resource('incriptions', IncriptionsController::class);
    Route::get('inscripciones/delete/{id_control}/{id_ins}', [IncriptionsController::class,'delete'])->name('inscripciones.delete');
    Route::get('inscripciones/cambio/{id_control}/{nombre_asig}/{carrera}', [IncriptionsController::class,'cambio'])->name('inscripciones.cambio');
    Route::get('inscripciones/adicionar', [IncriptionsController::class,'adicionar'])->name('inscripciones.adicion');
    Route::post('inscripciones/update-seccion', [IncriptionsController::class,'seccion_ca'])->name('inscripciones.update_seccion');
    Route::post('inscripciones/save_adicion', [IncriptionsController::class,'save_adicion'])->name('inscripciones.save_adicion');
    Route::get('inscripciones/constancia', [IncriptionsController::class,'constancia_ins'])->name('inscripciones.constancia');
    Route::get('inscripciones/verconstancia', [IncriptionsController::class,'ver_constancia'])->name('inscripciones.ver_constancia');
    
    //Rutas de horarios
    Route::get('horarios/mi_horario', [ScheduleController::class,'horario_ins'])->name('horario.mi_horario');
    //Rutas notas
    Route::get('notas/estudiantes', [ScoreController::class,'notas_estudiantes'])->name('notas.notas_estudiantes');
    Route::get('notas/descripcion/{id}', [ScoreController::class,'ver_notas'])->name('notas.ver');
    Route::get('notas/constancia', [ScoreController::class,'constancia_notas'])->name('notas.constancia');
    Route::get('notas/ver_constancia', [ScoreController::class,'ver_constancia_notas'])->name('notas.ver_constancia');
    
    Route::resource('courses', CourseController::class);
    Route::resource('scores', ScoreController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('semesters', SemesterController::class);
    //Rutas del controlador de inscripciones
    Route::resource('incriptions', IncriptionsController::class);
    Route::get('inscripciones/delete/{id_control}/{id_ins}', [IncriptionsController::class,'delete'])->name('inscripciones.delete');
    Route::get('inscripciones/cambio/{id_control}/{nombre_asig}/{carrera}', [IncriptionsController::class,'cambio'])->name('inscripciones.cambio');
    Route::get('inscripciones/adicionar', [IncriptionsController::class,'adicionar'])->name('inscripciones.adicion');
    Route::post('inscripciones/update-seccion', [IncriptionsController::class,'seccion_ca'])->name('inscripciones.update_seccion');
    Route::post('inscripciones/save_adicion', [IncriptionsController::class,'save_adicion'])->name('inscripciones.save_adicion');
    Route::get('inscripciones/constancia', [IncriptionsController::class,'constancia_ins'])->name('inscripciones.constancia');
    Route::get('inscripciones/verconstancia', [IncriptionsController::class,'ver_constancia'])->name('inscripciones.ver_constancia');
    
    //Rutas de horarios
    Route::get('horarios/mi_horario', [ScheduleController::class,'horario_ins'])->name('horario.mi_horario');
    //Rutas notas
    Route::get('notas/estudiantes', [ScoreController::class,'notas_estudiantes'])->name('notas.notas_estudiantes');
    Route::get('notas/descripcion/{id}', [ScoreController::class,'ver_notas'])->name('notas.ver');
    Route::get('notas/constancia', [ScoreController::class,'constancia_notas'])->name('notas.constancia');
    Route::get('notas/ver_constancia', [ScoreController::class,'ver_constancia_notas'])->name('notas.ver_constancia');
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
