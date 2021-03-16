<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Series;
use App\Models\User;

class CourseController extends Controller
{
    public $courses;
    public $mentor;
    
    public function __construct(){
        $this->middleware(function ($request, $next) {
            switch (Auth::user()->roles[0]->name) {
              case 'administrator':
                $this->courses = Course::all();
                $this->mentor = User::role('mentor')->get();
                break;
                
              case 'mentor':
                $this->courses = Auth::user()->courseMentors;
                $this->mentor = User::role('mentor')->where('email', Auth::user()->email)->get();
                break;
              
              default:
                $this->courses = [];
                $this->mentor = [];
                break;
            }
          return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.course.index', [
            'courses' => $this->courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.course.create', [
          'mentors' => $this->mentor,
          'series'  => Series::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
