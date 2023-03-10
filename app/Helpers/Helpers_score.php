<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Incription;
use App\Models\student;
use App\Models\Controls_incription;
use App\Models\User;
use App\Models\Section;
use App\Models\professor;


function mostrar_datos($id){

    //Busco el id de la inscripcion
    $inscripcion = Incription::where('student_id', $id)->first();
    //Busco todos los registros que coincidan con el id de la inscripcion
    $control_ins = Controls_incription::where('incription_id', $inscripcion->id)->get();
    $materias_ins= array();
    $cont=0;
    foreach($control_ins as $control){
        //Añado las asignaturas inscritas al array
        $asignatura = Course::find($control->course_id);
        $materias_ins[$cont]['asignatura'] = $asignatura;
        $materias_ins[$cont]['control_ins'] = $control;
        $cont++;
    }
    return $materias_ins;
}

function mostrar_datos_notas($id){
    
    $nombre_asignaturas = DB:: table('courses')
    ->join('controls_incriptions', 'controls_incriptions.course_id', '=', 'courses.id' )
    ->join('incriptions' , 'controls_incriptions.incription_id', '=', 'incriptions.id')
    ->join('people', 'people.id', '=', 'incriptions.student_id')
    ->leftJoin('scores', 'scores.student_id', '=', 'people.id')
    ->selectraw('courses.id as id, ')
    ->get();
    
    return $nombre_asignaturas; 
}

function asignaturas_professor_adicion($id, $nombre){
    
    $nombre_asignaturas = DB:: table('courses')
    ->selectRaw("course_type, career_id, COUNT(course_type) as secciones")
    ->where('career_id', $id)
    ->where('course_type', $nombre)
    ->groupBy('course_type','career_id')
    ->get();
    
    return $nombre_asignaturas; 
}

