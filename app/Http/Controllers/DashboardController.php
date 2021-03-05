<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class DashboardController extends Controller
{
    
    public $countDataCourses;
    public $countDataUsers;
    
    public function __construct()
    {
      $this->middleware(function ($request, $next) {
          switch (Auth::user()->roles[0]->name) {
            case 'administrator':
              $this->countDataCourses = Course::all()->count();
              $this->countDataUsers   = User::all()->count();
              break;
              
            case 'mentor':
              $this->countDataCourses = Auth::user()->courseMentors->count();
              $this->countDataUsers   = null;
              break;
              
            case 'student':
              $this->countDataCourses = Auth::user()->courses->count();
              break;
            
            default:
              $this->countDataCourses = null;
              break;
          }
        return $next($request);
      });
    }
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'quote'            => Inspiring::quote(),
            'greeting'         => $this->_greeting(),
            'chartDataCourses' => json_encode($this->_getChartDataCourses()),
            'chartDataUsers'   => json_encode($this->_getChartDataUsers()),
            'countDataCourses' => $this->countDataCourses,
            'countDataUsers'   => $this->countDataUsers,
        ]);
    }
    
    private function _greeting()
    {
        $time = date("H");
        $time += 7;
        $timeZone = date("e");
        
        if ($time < 12) {
          $greeting = "Good Morning";
        }elseif ($time >= 12 && $time < 17) {
          $greeting = "Good Afternoon";
        }elseif ($time >= 17 && $time < 19) {
          $greeting = "Good Evening";
        }elseif ($time >= 19) {
          $greeting = "Good Night";
        }
        
        return $greeting;
    }
    
    private function _getChartDataCourses()
    {
        $course = Course::select(DB::raw("COUNT(created_at) as count"))
                              ->whereYear('created_at', date('Y'))
                              ->groupBy(DB::raw("Month(created_at)"))
                              ->pluck('count');
        
        return $course;
    }
    
    private function _getChartDataUsers()
    {
        $users = User::select(DB::raw("COUNT(created_at) as count"))
                              ->whereYear('created_at', date('Y'))
                              ->groupBy(DB::raw("Month(created_at)"))
                              ->pluck('count');

        return $users;
    }
}
