<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemporarySystemController extends Controller
{
    //public function __construct()
    //{
    //    $this->drive = \Storage::disk('google')->getDriver()->getAdapter()->getClient();
    //}
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
          $file = $request->file('thumbnail');

          $name = $file->getClientOriginalName();
          $folder = uniqid() . '-' . now();
      
        }
        
      return '';
    }
}
