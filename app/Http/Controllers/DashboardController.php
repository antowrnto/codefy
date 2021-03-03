<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;

class DashboardController extends Controller
{
    
    
    public function __construct()
    {
        //
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
            'chartDataCourses' => $this->_getChartDataCourses(),
            'chartDataUsers'   => $this->_getChartDataUsers(),
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
        $months = Course::select(DB::raw("MONTH(created_at) as month"))
                              ->whereYear('created_at', date('Y'))
                              ->groupBy(DB::raw("Month(created_at)"))
                              ->pluck('month');
    
        $datas = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($months as $index => $month) {
          $datas[$month] = $course[$index];
        }  
        
        return $datas;
    }
    
    private function _getChartDataUsers()
    {
        //
    }
}
