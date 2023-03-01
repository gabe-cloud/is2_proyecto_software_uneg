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
use App\Models\Person;
use PDF;


class ScoreController extends Controller
{
    public function notas_estudiantes(){
        
        $datos = mostrar_datos();
            
        return view('scores.ver_nota_estudiante', [
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
        
        if(count($notas)>=1){
            foreach($notas as $nota){
                $total += $nota->score;
            }
    
            return view('scores.description', [
                'total' => $total,
                'notas' => $notas,
                'i' => $i,
                'nombre_asig' => $asignatura
            ]);
        }else{
            return view('scores.description', [
                'nombre_asig' => $asignatura
            ]);
        } 

    }

    public function constancia_notas()
    {
        $user = \Auth::user();
        $id_user = $user->id;
        $mis_datos = Person::find($id_user);
        $notas = DB:: table('scores')
        ->selectRaw("SUM(score) as nota_final, course_id, student_id")
        ->where('student_id', $id_user)
        ->groupBy('course_id','student_id')
        ->get();
    
        $nombre_asig = array();
        $i=0;

        foreach($notas as $nota){
            $asignatura = Course::find($nota->course_id);
            $nombre_asig[$i] =$asignatura->course_type;
            $i++;
        }
        $i = 0;
        
        if(count($notas)>=1){
            
            view()->share('scores.constancia_notas', [$notas, $mis_datos, $nombre_asig, $i]);

            $pdf = PDF::loadView('scores.constancia_notas', ['notas' => $notas, 'mis_datos' => $mis_datos, 'nombre_asig' => $nombre_asig, 'i' => $i]);

            return $pdf->download('Inscripcion.constancia_notas');
        }else{
            $datos = mostrar_datos();
            
            return view('scores.index', [
                'asignaturas' => $datos
            ])->with([
                'message'=> 'No hay notas para mostrar'
            ]);
        }
        
        
    }

    public function ver_constancia_notas(){
        $user = \Auth::user();
        $id_user = $user->id;
        $mis_datos = Person::find($id_user);
        $notas = DB:: table('scores')
        ->selectRaw("SUM(score) as nota_final, course_id, student_id")
        ->where('student_id', $id_user)
        ->groupBy('course_id','student_id')
        ->get();
        $nombre_asig = array();
        $i=0;

        foreach($notas as $nota){
            $asignatura = Course::find($nota->course_id);
            $nombre_asig[$i] =$asignatura->course_type;
            $i++;
        }
        $i = 0;
        
    
        if(count($notas)>=1){
            
            return view('scores.constancia_notas', [
                'notas' => $notas,
                'mis_datos' => $mis_datos,
                'nombre_asig' => $nombre_asig,
                'i' => $i
            ]);
        }else{
            $datos = mostrar_datos();
            
            return view('scores.index', [
                'asignaturas' => $datos
            ])->with([
                'message'=> 'No hay notas para mostrar'
            ]);
        }
       
    }


    function __construct()
    {
         $this->middleware('permission:score-list|score-create|score-edit|score-delete', ['only' => ['index','show']]);
         $this->middleware('role:student', ['only' => ['notas_estudiantes']]);
         $this->middleware('permission:score-create', ['only' => ['create','store']]);
         $this->middleware('permission:score-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:score-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $scores = Score::latest()->paginate(5);
        return view('scores.index',compact('scores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('scores.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'course_id' => 'required',
            'description' => 'required',
            'student_id' => 'required',
            'score' => 'required',
            'score_date' => 'required',

        ]);
    
        Score::create($request->all());
    
        return redirect()->route('scores.index')
                        ->with('success','Score created successfully.');
    }
    

    public function show(Score $score)
    {
        return view('scores.show',compact('score'));
    }
    
    public function edit(Score $score)
    {
        return view('scores.edit',compact('score'));
    }
    
    public function update(Request $request, Score $score)
    {
        request()->validate([
            'id' => 'required',
            'course_id' => 'required',
            'description' => 'required',
            'student_id' => 'required',
            'score' => 'required',
            'score_date' => 'required',

        ]);
    
    
        $score->update($request->all());
    
        return redirect()->route('scores.index')
                        ->with('success','Scores updated successfully');
    }
    
    public function destroy(Score $score)
    {
        $score->delete();
    
        return redirect()->route('scores.index')
                        ->with('success','Score deleted successfully');
    }

}
