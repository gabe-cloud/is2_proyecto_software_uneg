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
        $this->middleware('role:professor|admin', ['only' => ['index','show']]);
    }
 
    public function index()
    {
        /*
        $scores = Score::latest()->paginate(5);
        */
        $user = \Auth::user();
        $id_user = $user->id;
        
        $prof_scoring = DB:: table('courses')
            ->leftjoin('controls_incriptions', 'controls_incriptions.course_id', '=', 'courses.id')            
            ->leftjoin('schedules', 'schedules.id', '=', 'courses.schedules_id')            
            ->selectraw("courses.id AS id, count(controls_incriptions.id) as student_count, courses.course_type as type,
            schedules.entry_time as entry_time,  schedules.departure_time as departure_time, schedules.day as day")
            ->where('courses.professor_id', '=', $id_user)
            ->groupBy('courses.id')
            ->get();

        //$scores = Score::latest()->paginate(5);
            return view('course-scores.index',compact('prof_scoring'))
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
        $prof_scoring = DB:: table('courses')
        ->join('controls_incriptions', 'controls_incriptions.course_id', '=', 'courses.id' )
        ->join('incriptions' , 'controls_incriptions.incription_id', '=', 'incriptions.id')
        ->join('people', 'people.id', '=', 'incriptions.student_id')
        ->join('students', 'students.id', '=', 'incriptions.student_id')
        ->leftJoin('scores', function($join){
            $join->on("scores.student_id","=","incriptions.student_id")
                 ->on("scores.course_id","=","courses.id");
        })
        ->where('courses.id', $id)
        
        ->selectraw("people.id AS id, courses.section_id as section, courses.course_type as type, people.ci as ci, people.phone_number as
        phone_number,people.name as name, people.email as email, people.last_name as last_name, sum(scores.score) as score, count(scores.id) as score_count")   
        ->groupBy('controls_incriptions.id')
        ->get();


        return view('course-scores.show',compact('prof_scoring'))
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