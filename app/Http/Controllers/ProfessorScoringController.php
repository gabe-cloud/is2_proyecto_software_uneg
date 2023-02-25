<?php
    
namespace App\Http\Controllers;
    
use App\Models\Course;
use App\Models\Score;
use App\Models\Student;
use App\Models\Professor;
use Illuminate\Http\Request;
use DB;
use Hash;

class ProfessorScoringController extends Controller
{ 
  
    function __construct() 
    {

    }
 
    public function index()
    {
        /*
        $scores = Score::latest()->paginate(5);
        */
        $user = \Auth::user();
        $id_user = $user->id;
        
        $scores = DB:: table('courses')
            ->join('controls_incriptions', 'controls_incriptions.course_id', '=', 'courses.id' )
            ->join('incriptions' , 'controls_incriptions.incription_id', '=', 'incriptions.id')
            ->join('people', 'people.id', '=', 'incriptions.student_id')
            //->leftJoin('scores', 'scores.student_id', '=', 'people.id')
            ->leftJoin('scores', function($join){
                $join->on("scores.student_id","=","incriptions.student_id")
                     ->on("scores.course_id","=","courses.id");
            })
            ->where('courses.id', '=', '1')
            ->selectraw("people.id AS id, courses.section_id as section, courses.course_type as type, people.ci as ci, people.phone_number as
            phone_number,people.name as name, people.email as email, people.last_name as last_name, scores.score as score")
            
            ->get();

        //$scores = Score::latest()->paginate(5);
            return view('course-scores.index',compact('scores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create() //Crea la vista para ver la creacion de notas
    {

    }
    
    public function store(Request $request)
    {

    }
    

    public function show($id) //Metodo que muestra todos los alumnos de una asignatura y muestran sus notas si tiene
    {
        $scores = DB:: table('courses')
        ->join('controls_incriptions', 'controls_incriptions.course_id', '=', 'courses.id' )
        ->join('incriptions' , 'controls_incriptions.incription_id', '=', 'incriptions.id')
        ->join('people', 'people.id', '=', 'incriptions.student_id')
        ->leftJoin('scores', function($join){
            $join->on("scores.student_id","=","incriptions.student_id")
                 ->on("scores.course_id","=","courses.id");
        })
        ->where('courses.id', $id)
        ->selectraw("people.id AS id, courses.section_id as section, courses.course_type as type, people.ci as ci, people.phone_number as
        phone_number,people.name as name, people.email as email, people.last_name as last_name, scores.score as score")        
        ->get();


        return view('course-scores.show',compact('scores'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function edit(Score $score) //Metodo que permita editar las notas si existen.
    {

    }
    
    public function update(Request $request, Score $score)
    {

    }
    
    public function destroy(Student $student)
    {

    }
}