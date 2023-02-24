<?php
    
namespace App\Http\Controllers;
    
use App\Models\Coordinator;
use App\Models\rol;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\model_has_rol;
    
class CoordinatorController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:coordinator-list|coordinator-create|coordinator-edit|coordinator-delete', ['only' => ['index','show']]);
         $this->middleware('permission:coordinator-create', ['only' => ['create','store']]);
         $this->middleware('permission:coordinator-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coordinator-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $coordinators = Coordinator::latest()->paginate(5);
        return view('coordinators.index',compact('coordinators'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $cordinadores = Coordinator::get();
        $datos = Sacar_datos_roles('Coordinador', $cordinadores);
        return view('coordinators.create',[
            'datos' => $datos
        ]);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'appointment' => 'required',
            'date_admission' => 'required',
        ]);
    
        Coordinator::create($request->all());
    
        return redirect()->route('coordinators.index')
                        ->with('success','Coordinator created successfully.');
    }
    

    public function show(Coordinator $coordinator)
    {
       
        return view('coordinators.show', [
            'coordinator' => $coordinator
        ]);
    }
    
    public function edit(Coordinator $coordinator)
    {
        return view('coordinators.edit',compact('coordinator'));
    }
    
    public function update(Request $request, Coordinator $coordinator)
    {
        request()->validate([
            'id' => 'required',
            'appointment' => 'required',
            'date_admission' => 'required',
        ]);
    
        $coordinator->update($request->all());
    
        return redirect()->route('coordinators.index')
                        ->with('success','Coordinator updated successfully');
    }
    
    public function destroy(Coordinator $coordinator)
    {
        $coordinator->delete();
    
        return redirect()->route('coordinators.index')
                        ->with('success','Coordinator deleted successfully');
    }
}