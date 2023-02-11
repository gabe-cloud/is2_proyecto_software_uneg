<?php
    
namespace App\Http\Controllers;
    
use App\Models\Semester;
use Illuminate\Http\Request;
    
class SemesterController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:semester-list|semester-create|semester-edit|semester-delete', ['only' => ['index','show']]);
         $this->middleware('permission:semester-create', ['only' => ['create','store']]);
         $this->middleware('permission:semester-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:semester-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $semesters = Semester::latest()->paginate(5);
        return view('semesters.index',compact('semesters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('semesters.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'semester_number' => 'required',

        ]);
    
        Semester::create($request->all());
    
        return redirect()->route('semesters.index')
                        ->with('success','Semester created successfully.');
    }
    

    public function show(Semester $semester)
    {
        return view('semesters.show',compact('semester'));
    }
    
    public function edit(Semester $semester)
    {
        return view('semesters.edit',compact('semester'));
    }
    
    public function update(Request $request, Semester $semester)
    {
        request()->validate([
            'id' => 'required',
            'semester_number' => 'required',

        ]);
    
        $semester->update($request->all());
    
        return redirect()->route('semesters.index')
                        ->with('success','Semester updated successfully');
    }
    
    public function destroy(Semester $semester)
    {
        $semester->delete();
    
        return redirect()->route('semesters.index')
                        ->with('success','Semestre deleted successfully');
    }
}