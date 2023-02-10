<?php
    
namespace App\Http\Controllers;
    
use App\Models\Person;
use Illuminate\Http\Request;
    
class PersonController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:person-list|person-create|person-edit|person-delete', ['only' => ['index','show']]);
         $this->middleware('permission:person-create', ['only' => ['create','store']]);
         $this->middleware('permission:person-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:person-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $people = Person::latest()->paginate(5);
        return view('people.index',compact('people'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('people.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'ci' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required',

        ]);
    
        Person::create($request->all());
    
        return redirect()->route('people.index')
                        ->with('success','Person created successfully.');
    }
    

    public function show(Person $person)
    {
        return view('people.show',compact('person'));
    }
    
    public function edit(Person $person)
    {
        return view('people.edit',compact('person'));
    }
    
    public function update(Request $request, Person $person)
    {
         request()->validate([
            'id' => 'required',
            'ci' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required',

        ]);
    
        $person->update($request->all());
    
        return redirect()->route('people.index')
                        ->with('success','Person updated successfully');
    }
    
    public function destroy(Person $person)
    {
        $person->delete();
    
        return redirect()->route('people.index')
                        ->with('success','Person deleted successfully');
    }
}