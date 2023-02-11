<?php
    
namespace App\Http\Controllers;
    
use App\Models\Score;
use Illuminate\Http\Request;
    
class ScoreController extends Controller
{ 
  
    function __construct()
    {
         $this->middleware('permission:score-list|score-create|score-edit|score-delete', ['only' => ['index','show']]);
         $this->middleware('permission:score-create', ['only' => ['create','store']]);
         $this->middleware('permission:score-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:score-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        $scores = Score::latest()->paginate(5);
        return view('scores.index',compact('scores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('scores.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'course_id' => 'required',
            'student_id' => 'required',
            'score' => 'required',
            'score_date' => 'required',

        ]);
    
        Score::create($request->all());
    
        return redirect()->route('scores.index')
                        ->with('success','Score created successfully.');
    }
    

    public function show(Score $score)
    {
        return view('scores.show',compact('score'));
    }
    
    public function edit(Score $score)
    {
        return view('scores.edit',compact('score'));
    }
    
    public function update(Request $request, Score $score)
    {
        request()->validate([
            'id' => 'required',
            'course_id' => 'required',
            'student_id' => 'required',
            'score' => 'required',
            'score_date' => 'required',

        ]);
    
    
        $score->update($request->all());
    
        return redirect()->route('scores.index')
                        ->with('success','Scores updated successfully');
    }
    
    public function destroy(Score $score)
    {
        $score->delete();
    
        return redirect()->route('scores.index')
                        ->with('success','Score deleted successfully');
    }
}