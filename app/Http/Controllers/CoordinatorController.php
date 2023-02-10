<?php
    
namespace App\Http\Controllers;
    
use App\Models\Coordinator;
use Illuminate\Http\Request;
    
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
        return view('coordinators.create');
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