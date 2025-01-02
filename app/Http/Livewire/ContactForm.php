<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $question;

    public function mount()
    {
        
    }
    
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'question' => 'required',
    ];
 
    public function save()
    {
        $this->validate();
        if ($this->question=='E') {
            Mail::to('info@mortgagerefused.com')->send(new Contact($this->name,$this->email,$this->message,$this->question));
            redirect()->to('/contact-thanks');
        }
        else {

        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
