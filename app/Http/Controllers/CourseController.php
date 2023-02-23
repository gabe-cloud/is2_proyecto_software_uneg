<?php
    
namespace App\Http\Controllers;
    
use App\Models\Course;
use Illuminate\Http\Request;
    
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
        $courses = Course::latest()->paginate(5);
        return view('courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('courses.create');
    }
    
    public function store(Request $request)
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
    
        $course->update($request->all());
    
        return redirect()->route('courses.index')
                        ->with('success','Courses updated successfully');
    }
    
    public function destroy(Course $course)
    {
        $course->delete();
    
        return redirect()->route('courses.index')
                        ->with('success','Course deleted successfully');
    }
}