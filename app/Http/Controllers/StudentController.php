<?php
    
namespace App\Http\Controllers;
    
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Semester;

class StudentController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','show']]);
         $this->middleware('permission:student-create', ['only' => ['create','store']]);
         $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $estudiantes = Student::get();
        $datos = Sacar_datos_roles('Estudiante', $estudiantes);
        $carreras = Career::get();
        
        return view('students.create',[
            'carreras' => $carreras,
            'datos' => $datos
        ]);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'semester_id' => 'required',
            'career_id' => 'required',
            'date_admission' => 'required',
            'status' => 'required',

        ]);
    
        Student::create($request->all());
    
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }
    

    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }
    
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }
    
    public function update(Request $request, Student $student)
    {
        request()->validate([
            'id' => 'required',
            'semester_id' => 'required',
            'career_id' => 'required',
            'date_admission' => 'required',
            'status' => 'required',

        ]);
        $carrera = Career::find($request->input('career_id'));
        $semestre = Semester::find($request->input('semester_id'));

        if($carrera && $semestre){
            $student->update($request->all());
    
            return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
        }else{
            return redirect()->route('students.edit', [
                'student' => $student
            ])->with('Error','El id de carrera o el id de semestre no existe');
        }
        
    }
    
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}