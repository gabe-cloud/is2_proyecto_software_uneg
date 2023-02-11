<?php
    
namespace App\Http\Controllers;
    
use App\Models\Section;
use Illuminate\Http\Request;
    
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
        return view('sections.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'career_id' => 'required',
            'semester_id' => 'required',
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
            'semester_id' => 'required',
            'section_number' => 'required',
        ]);
    
        $section->update($request->all());
    
        return redirect()->route('sections.index')
                        ->with('success','Section updated successfully');
    }
    
    public function destroy(Section $section)
    {
        $section->delete();
    
        return redirect()->route('sections.index')
                        ->with('success','Section deleted successfully');
    }
}