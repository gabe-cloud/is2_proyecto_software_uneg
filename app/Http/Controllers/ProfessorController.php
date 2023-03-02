<?php
    
namespace App\Http\Controllers;
    
use App\Models\Professor;
use App\Models\Person;
use Illuminate\Http\Request;
    
class ProfessorController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:professor-list|professor-create|professor-edit|professor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:professor-create', ['only' => ['create','store']]);
         $this->middleware('permission:professor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:professor-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $professors = Professor::latest()->paginate(5);
        return view('professors.index',compact('professors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $profesores = Professor::get();
        $datos = Sacar_datos_roles('professor', $profesores);
        return view('professors.create', [
            'datos' => $datos
        ]);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'profession' => 'required',
            'date_admission' => 'required',
            'professor_type' => 'required',

        ]);
    
        Professor::create($request->all());
    
        return redirect()->route('professors.index')
                        ->with('success','Professor created successfully.');
    }
    

    public function show(Professor $professor)
    {
        return view('professors.show', [
            'professor' => $professor
        ]);
    }
    
    public function edit(Professor $professor)
    {
        return view('professors.edit',compact('professor'));
    }
    
    public function update(Request $request, Professor $professor)
    {
        request()->validate([
            'id' => 'required',
            'profession' => 'required',
            'date_admission' => 'required',
            'professor_type' => 'required',

        ]);
    
        $professor->update($request->all());
    
        return redirect()->route('professors.index')
                        ->with('success','Professors updated successfully');
    }
    
    public function destroy(Professor $professor)
    {
        $professor->delete();
    
        return redirect()->route('professors.index')
                        ->with('success','Professor deleted successfully');
    }
}