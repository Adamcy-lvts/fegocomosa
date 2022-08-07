<?php

namespace App\Http\Livewire\UserDashboard\Resume;

use App\Models\User;
use Livewire\Component;

class ViewResume extends Component
{
     protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        $member = User::find(auth()->user()->id);

        return view('livewire.user-dashboard.resume.view-resume', [
            'member' => $member
        ])->layout('components.user-dashboard');
    }
}
