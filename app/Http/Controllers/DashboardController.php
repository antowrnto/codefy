<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;

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
            'quote'    => Inspiring::quote(),
            'greeting' => $this->_greeting()
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
}
