<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class ArtisanRunCommandController extends Controller
{
    public function migrate(){
      Artisan::call('migrate');
      session()->flash('success', 'Database Has Been Migration');
      
      return redirect()->back();
    }
    
    public function migrateFresh(){
      Artisan::call('fresh');
      session()->flash('success', 'Database Has Been Migration');
      
      return redirect()->back();
    }
}
