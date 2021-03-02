<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderDashboard extends Component
{
    protected $listeners = [
      'refresh-header' => '$refresh',
      
    ];
    
    public function render()
    {
        return view('livewire.header-dashboard');
    }
}
