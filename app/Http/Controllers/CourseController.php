<?php
    
namespace App\Http\Controllers;
    
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Professor;
use App\Models\Schedule;
use App\Models\Career;
    
class CourseController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:course-create', ['only' => ['create','store']]);
         $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $user = \Auth::user();
        $id_user = $user->id;
        if ($user->hasrole('professor')){
            $courses = Course::latest()->where('courses.professor_id', '=', $id_user)->paginate(5);
        }
        else
             $courses = Course::latest()->paginate(5);
        return view('courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $carreras = Career::get();
        $profesores = Professor::get();
        $horarios = Schedule::get();
        $secciones = Section::get();
        return view('courses.create', [
            'secciones' => $secciones,
            'carreras' => $carreras,
            'profesores' => $profesores,
            'horarios' => $horarios
        ]);
    }
    
    public function store(Request $request)
    {
        request()->validate([
        
            'professor_id' => 'required',
            'section_id' => 'required',
            'career_id' => 'required',
            'schedules_id' => 'required',
            'course_type' => 'required',
            'credit_units' => 'required',

        ]);
    
        Course::create($request->all());
    
        return redirect()->route('courses.index')
                        ->with('success','Course created successfully.');
    }
    

    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }
    
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }
    
    public function update(Request $request, Course $course)
    {
        request()->validate([
            'id' => 'required',
            'professor_id' => 'required',
            'section_id' => 'required',
            'career_id' => 'required',
            'schedules_id' => 'required',
            'course_type' => 'required',
            'credit_units' => 'required',

        ]);
        
        $profesor = Professor::find($request->input('professor_id'));
        $seccion = Section::find($request->input('section_id'));
        $horario = Schedule::find($request->input('schedules_id'));

        if($profesor && $seccion && $horario){
            $course->update($request->all());
    
            return redirect()->route('courses.index')
                        ->with('success','Courses updated successfully');
        }else{
            return redirect()->route('courses.edit', [
                'course' => $course
            ])->with('Error','El id de profesor, seccion o del horario no es valido');
        }

        
    }
    
    public function destroy(Course $course)
    {
        $course->delete();
    
        return redirect()->route('courses.index')
                        ->with('success','Course deleted successfully');
    }
}