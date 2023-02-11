<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Incription;
use App\Models\Student;
use App\Models\Controls_incription;
use App\Models\User;
use App\Models\Section;
use App\Models\Score;


class ScoreController extends Controller
{
    public function index(){
        $user = \Auth::user();
        $id_user = $user->id;
        $estudiante = Student::find($id_user);
        $inscripcion = Incription::where('student_id', $estudiante->id)->first();
        $datos = $inscripcion->control_inscripcion_ins;
            
        return view('scores.index', [
            'asignaturas' => $datos
        ]);
    }

    public function ver_notas($id){
        
        $user = \Auth::user();
        $id_user = $user->id;
        
        $notas = Score::where('student_id', $id_user)->where('course_id', $id)->get();
        $asignatura = Course::find($id);
        $total =0;
        $i=0;
        foreach($notas as $nota){
            $total += $nota->score;
        }

        return view('scores.description', [
            'total' => $total,
            'notas' => $notas,
            'i' => $i,
            'nombre_asig' => $asignatura
        ]);

    }
}
