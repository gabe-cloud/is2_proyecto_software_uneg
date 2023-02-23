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
        //se busca el id del coordinador en la tabal rol
        $coordinador = rol::where('name', 'Coordinador')->first();
        $id_coordinador = $coordinador->id;
        //se tienen todas las personas
        $personas = Person::get();
        $control_roles = model_has_rol::get();
        $cordinadores = Coordinator::get();
        $total_coordiandor = [];
        $cont = 0;
        $ban = false;
        foreach($personas as $persona){
            //se recoren los controles de roles para compararlos
            foreach ($control_roles as $control) {
                //se compara si el rol es igual al del coordinador y si el modelo_id es igual al id de la persona
                if($control->role_id == $id_coordinador && $control->model_id == $persona->id){
                    
                    foreach ($cordinadores as $coor) {
                        //se verifica que este coordinador no tenga ya un cargo
                        if($coor->id == $persona->id){
                            $ban = true;
                        }
                    }
                    if(!$ban){
                        //se guardan los coordinadores que no tiene un cargo (que no estan asignados)
                        $total_coordiandor[$cont] = $persona;
                        $cont++;
                    }
                    $ban = false;
                }
            }
            
        }

        return view('coordinators.create',[
            'datos' => $total_coordiandor
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
        return view('coordinators.show',compact('coordinator'));
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