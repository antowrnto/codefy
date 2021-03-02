<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateProfileInformationAccount extends Component
{
    public $account = [];
    
    public $bio = "";
    public $birt_day = "";
    public $language = "";
    
    public function mount()
    {
        $this->account = auth()->user()->account->toArray();
    }
  
    public function render()
    {
        return view('profile.update-profile-information-account');
    }
    
    public function updateProfileInformation()
    {
        dd($bio, $birt_day, $language);
    }
}
