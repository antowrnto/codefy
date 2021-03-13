<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('landing.welcome', [
          'courses' => Course::take(3)->latest()->get()
        ]);
    }
    
    public function about()
    {
        return view('landing.about');
    }
}
