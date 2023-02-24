<?php
    
namespace App\Http\Controllers;
    
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Semester;

    
class SectionController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:section-list|section-create|section-edit|section-delete', ['only' => ['index','show']]);
         $this->middleware('permission:section-create', ['only' => ['create','store']]);
         $this->middleware('permission:section-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:section-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $sections = Section::latest()->paginate(5);
        return view('sections.index',compact('sections'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $carreras = Career::get();
        $semestres = Semester::get();
        return view('sections.create', [
            'carreras' => $carreras,
            'semestres' => $semestres
        ]);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'career_id' => 'required',
            'semesters_id' => 'required',
            'section_number' => 'required',
        ]);
    
        Section::create($request->all());
    
        return redirect()->route('sections.index')
                        ->with('success','Section created successfully.');
    }
    

    public function show(Section $section)
    {
        return view('sections.show',compact('section'));
    }
    
    public function edit(Section $section)
    {
        return view('sections.edit',compact('section'));
    }
    
    public function update(Request $request, Section $section)
    {
        request()->validate([
            'id' => 'required',
            'career_id' => 'required',
            'semesters_id' => 'required',
            'section_number' => 'required',
        ]);
    
        $carrera = Career::find($request->input('career_id'));
        $semestre = Semester::find($request->input('semesters_id'));

        if($carrera && $semestre){
            $section->update($request->all());
    
            return redirect()->route('sections.index')
                        ->with('success','Section updated successfully');
        }else{
            return redirect()->route('sections.edit', [
                'section' => $section
            ])->with('Error','Error en el id de carrera o de semestre');
        }

        
    }
    
    public function destroy(Section $section)
    {
        $section->delete();
    
        return redirect()->route('sections.index')
                        ->with('success','Section deleted successfully');
    }
}