<?php
    
namespace App\Http\Controllers;
    
use App\Models\Schedule;
use Illuminate\Http\Request;
    
class ScheduleController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:schedule-list|schedule-create|schedule-edit|schedule-delete', ['only' => ['index','show']]);
         $this->middleware('permission:schedule-create', ['only' => ['create','store']]);
         $this->middleware('permission:schedule-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:schedule-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $schedules = Schedule::latest()->paginate(5);
        return view('schedules.index',compact('schedules'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('schedules.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'day' => 'required',
            'entry_time' => 'required',
            'departure_time' => 'required',

        ]);
    
        Schedule::create($request->all());
    
        return redirect()->route('schedules.index')
                        ->with('success','Schedule created successfully.');
    }
    

    public function show(Schedule $schedule)
    {
        return view('schedules.show',compact('schedule'));
    }
    
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',compact('schedule'));
    }
    
    public function update(Request $request, Schedule $schedule)
    {
        request()->validate([
            'id' => 'required',
            'day' => 'required',
            'entry_time' => 'required',
            'departure_time' => 'required',

        ]);
    
        $schedule->update($request->all());
    
        return redirect()->route('schedules.index')
                        ->with('success','Schedules updated successfully');
    }
    
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
    
        return redirect()->route('schedules.index')
                        ->with('success','Schedule deleted successfully');
    }
}