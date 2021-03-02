<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.series.index', [
            'series' => Series::latest()->get(),
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
        Series::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'url_icon' => $request->url_icon,
        ]);
        
        session()->flash('success', 'The series new has created');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $series = Series::findOrFail($request->id);
        
        $series->title = $request->title;
        $series->url_icon = $request->url_icon;
        $series->save();
        
        session()->flash('success', 'The series new has updated with new data');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        for ($c = 0; $c < $series->courses->count(); $c++) {
            for ($ce = 0; $ce < $series->courses[$c]->episodes->count(); $ce++) {
              $series->courses[$c]->episodes[$ce];
            }
          DB::table('course_joined_student')->where('course_id', $series->courses[$c]->id)->delete();
          $series->courses[$c]->delete();
        }
        
        $series->delete();
        
        session()->flash('success', 'The series new has deleted with course, episodes on relationship');
        return redirect()->back();
    }
}
