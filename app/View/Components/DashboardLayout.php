<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class DashboardLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.dashboard', [
            'name' => Auth::user()->name,
            'role' => Auth::user()->roles[0]->name,
            'profile_photo' => Auth::user()->profile_photo_url,
            'dark_mode' => (bool) Auth::user()->dark_mode
        ]);
    }
}
