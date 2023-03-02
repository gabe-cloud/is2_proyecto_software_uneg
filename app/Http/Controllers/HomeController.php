<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Course;
use App\Models\Score;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Person;
use DB;
use Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();
        $id_user = $user->id;
        $people = DB:: table('people')            
            ->leftjoin('students', 'students.id', '=', 'people.id' )
            ->leftjoin('coordinators', 'coordinators.id', '=', 'people.id' )
            ->leftjoin('professors', 'professors.id', '=', 'people.id' )
            ->where('people.id', '=', $id_user)
            ->get();
        return view('home',compact('people'));
    }
}
