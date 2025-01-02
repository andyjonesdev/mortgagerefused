<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Enquiry;
use App\Models\User;
use App\Mail\BrokerAssigned;
use Illuminate\Support\Facades\Mail;

class BrokerSelect extends Component
{
    public Enquiry $enquiry;
    public $brokers;

    public function mount($enquiry, $brokers)
    {
        $this->enquiry = $enquiry;
        $this->brokers = $brokers;
    }
 
    protected $rules = [
        'enquiry.user_id' => '',
    ];
 
    public function save()
    {
        $this->validate();
        $this->enquiry->save();
    }

    public function changeEvent($value)
    {
        $this->consoleLog('change event');
        // $this->consoleLog('value = '.$value);
        // $this->consoleLog('first_name = '.$this->enquiry->first_name);
        if ($value) {
            $this->enquiry->user_id = $value;
            $this->enquiry->save();
            $this->consoleLog('this->enquiry->user_id = '.$this->enquiry->user_id);
            $user = User::where('id', $this->enquiry->user_id)->first();
            $this->consoleLog('user email = '.$user->email);
            Mail::to($user->email)->send(new BrokerAssigned($this->enquiry,$user));
        } 
    }

    public function render()
    {
        return view('livewire.broker-select');
    }
}
