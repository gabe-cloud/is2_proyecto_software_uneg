<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Incription;
use App\Models\Student;
use App\Models\Controls_incription;
use App\Models\User;
use App\Models\Section;
use App\Models\rol;
use App\Models\Person;
use App\Models\model_has_rol;


function mostrar_datos(){

    $user = \Auth::user();
    $id_user = $user->id;
    $estudiante = Student::find($id_user);
    $inscripcion = Incription::where('student_id', $estudiante->id)->first();
    if ( $inscripcion!=null){
        $asignaturas = $inscripcion->control_inscripcion_ins;    
        return $asignaturas;
    }
    return null;
}

function asignaturas_carreras($id){
    
    $nombre_asignaturas = DB:: table('courses')
    ->selectRaw("course_type, career_id, COUNT(course_type) as secciones")
    ->where('career_id', $id)
    ->groupBy('course_type','career_id')
    ->get();
    
    return $nombre_asignaturas; 
}

function asignaturas_carreras_adicion($id, $nombre){
    
    $nombre_asignaturas = DB:: table('courses')
    ->selectRaw("course_type, career_id, COUNT(course_type) as secciones")
    ->where('career_id', $id)
    ->where('course_type', $nombre)
    ->groupBy('course_type','career_id')
    ->get();
    
    return $nombre_asignaturas; 
}

function save_control_inscripcion($estudiante, $nombres, $seccion, $id_inscripcion){
    
    $carrera_estudiante = $estudiante->career_id;
    $semestre_estudiante = $estudiante->semester_id;
    $cont=0;
    for($i=0; $i < count($seccion); $i++){
            
        if($seccion[$i] != 'no'){
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln("Hello from Terminal");
            //Se busca el id de la seccion
            $seccion_id = Section:: where('career_id', $estudiante->career_id)//->where('semesters_id', $semestre_estudiante) No recibe el id del semestre, necesitan arreglar esto.
            ->where('section_number', $seccion[$i])->first();
            //Se busa el id de la asignatura
            $asignatura = Course:: where('section_id', $seccion_id->id)->where('course_type', $nombres[$cont])->first();
            $cont++;
            //Se crea el nuevo registro por cada materia inscrita 
            $control_inscripcion = new Controls_incription();
            $control_inscripcion->incription_id = $id_inscripcion;
            $control_inscripcion->course_id = $asignatura->id;
            $control_inscripcion->save();

        }
    }
    return $cont;
}

function Sacar_datos_roles($buscar, $roles){
    //se busca el id del tipo del rol en la tabla
    $tipo = rol::where('name', $buscar)->first();
   /* var_dump($tipo->id);
    var_dump($buscar);
    var_dump($tipo);
    die();*/
    $rol_id = $tipo->id;
    //se tienen todas las personas
    $personas = Person::get();
    $control_roles = model_has_rol::get();
    //$cordinadores = Coordinator::get();
    $total= [];
    $cont = 0;
    $ban = false;
    foreach($personas as $persona){
        //se recoren los controles de roles para compararlos
        foreach ($control_roles as $control) {
            //se compara si el rol es igual al del tipo(corrdinador, estudiante, profesor) y si el modelo_id es igual al id de la persona
            if($control->role_id == $rol_id && $control->model_id == $persona->id){
                
                foreach ($roles as $rol) {
                    //se verifica que esta persona no tenga ya un cargo asignado
                    if($rol->id == $persona->id){
                        $ban = true;
                    }
                }
                if(!$ban){
                    //se guardan los datos que no tiene un cargo (que no estan asignados)
                    $total[$cont] = $persona;
                    $cont++;
                }
                $ban = false;
            }
        }
        
    }

    return $total;

}