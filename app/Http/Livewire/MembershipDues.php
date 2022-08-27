<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class MembershipDues extends Component
{
    public $paid = 10000;


    public function pay()
    {
        dd($this->paid);
        MembershipFee::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->paid,
            'year' => Carbon::now()->y,
        ]);
    }
    public function render()
    {
        return view('livewire.membership-dues');
    }
}
