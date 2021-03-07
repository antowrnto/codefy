<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateProfileInformationAccount extends Component
{
    public $dataUser = [];
    
    public $active = "";
    
    public function mount()
    {
        $this->dataUser = auth()->user()->account->toArray();
    }
    
    public function updateProfileInformation()
    {
      auth()->user()->account->update([
          'bio' => $this->dataUser['bio'],
          'birth_day' => $this->dataUser['birth_day'],
          'city' => $this->dataUser['city'],
          'language' => $this->dataUser['language'],
      ]);
      
      $this->active = "active";
    }
    
    public function render()
    {
        return view('profile.update-profile-information-account');
    }
}
