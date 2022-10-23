<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Vonage\Client;
use App\Models\User;
use Livewire\Component;
use App\Mail\ContactUsMail;
use Vonage\SMS\Message\SMS;
use Illuminate\Support\Facades\Mail;
use Vonage\Client\Credentials\Basic;
use App\Notifications\SmsNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactUsMessageNotification;

class ContactUsForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $showContactForm = false;

    public function mount()
    {
        if (auth()->user()) {
            $this->name = auth()->user()->first_name.' '.auth()->user()->last_name;
            $this->email = auth()->user()->email;
        }
    }

    public function contact()
    {
        $this->validate([
            'name'       => 'required',
            'email'      => 'required',
            'message'    => 'required',
        ]);

        if (auth()->user()) {
            $data = [

            'user_id' =>  auth()->user()->id,
            'name' =>  $this->name,
            'email' => auth()->user()->email,
            'message' =>  $this->message,
            'datetime' => Carbon::now()
        ];
        } else {
            $data = [
             'name' =>  $this->name,
             'email' => $this->email,
             'message' =>  $this->message,
             'datetime' => Carbon::now()
        ];
        }

        $admins = User::role('Super-Admin')->get();

        

        Notification::send($admins, new ContactUsMessageNotification($data, $this->email));

        $user = User::find(1);

        $user->notify(new SmsNotification($this->message));

        $this->emit('messageSubmitted');
    }
    public function render()
    {
        return view('livewire.contact-us-form');
    }
}
