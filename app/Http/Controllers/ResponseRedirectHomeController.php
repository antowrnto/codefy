<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseRedirectHomeController extends Controller
{
    /**
     * Handle the incoming request for redirecting to home.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response redirect to home
     */
    public function __invoke(Request $request)
    {
        switch (Auth::user()->roles[0]->name) {
          case 'administrator':
            return redirect()->route('dashboard.administrator');
            break;
            
          case 'mentor':
            return redirect()->route('dashboard.mentor');
            break;
            
          case 'student':
            return redirect()->route('dashboard.student');
            break;
          
          default:
            return abort(404);
            break;
        }
    }
}
