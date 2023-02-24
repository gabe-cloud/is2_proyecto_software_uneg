<?php
    
namespace App\Http\Controllers;
    
use App\Models\Career;
use App\Models\Coordinator;
use Illuminate\Http\Request;
    
class CareerController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:career-list|career-create|career-edit|career-delete', ['only' => ['index','show']]);
         $this->middleware('permission:career-create', ['only' => ['create','store']]);
         $this->middleware('permission:career-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:career-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $careers = Career::latest()->paginate(5);
        return view('careers.index',compact('careers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $datos = Coordinator::get();
        return view('careers.create', [
            'datos' => $datos
        ]);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'coordinator_id' => 'required',
            'career_type' => 'required',
            'name' => 'required',

        ]);
    
        Career::create($request->all());
    
        return redirect()->route('careers.index')
                        ->with('success','Career created successfully.');
    }
    

    public function show(Career $career)
    {
        return view('careers.show',compact('career'));
    }
    
    public function edit(Career $career)
    {
        return view('careers.edit',compact('career'));
    }
    
    public function update(Request $request, Career $career)
    {
        request()->validate([
            'id' => 'required',
            'coordinator_id' => 'required',
            'career_type' => 'required',
            'name' => 'required',

        ]);
        $coordinador = Coordinator::find($request->input('coordinator_id'));
        if($coordinador){
            $career->update($request->all());
    
            return redirect()->route('careers.index')
                        ->with('success','Careers updated successfully');
        }else{
            return redirect()->route('careers.edit', [
                'career' => $career
            ])->with('Error','El id del coordinador no existe');
        }
        
    }
    
    public function destroy(Career $career)
    {
        $career->delete();
    
        return redirect()->route('careers.index')
                        ->with('success','Career deleted successfully');
    }
}