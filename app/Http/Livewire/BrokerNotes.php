<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Enquiry;

class BrokerNotes extends Component
{
    public Enquiry $enquiry;
    public $showDiv = false;

    public function mount($enquiry)
    {
        $this->enquiry = $enquiry;
    }
    
    protected $rules = [
        'enquiry.client_fee_upfront' => 'int',
        'enquiry.client_fee_offer' => 'int',
        'enquiry.mortgage_proc_fee' => 'int',
        'enquiry.insurance' => 'int',
        'enquiry.solicitor' => 'string',
        'enquiry.secured_loan_hand_off' => 'string',
        'enquiry.notes_message' => 'string',
    ];
 
    public function save()
    {
        session()->flash('message', 'Updating...');
        //$this->validate();
        if ($this->enquiry->client_fee_upfront=='')
            $this->enquiry->client_fee_upfront = '0';
        if ($this->enquiry->client_fee_offer=='')
            $this->enquiry->client_fee_offer = '0';
        if ($this->enquiry->mortgage_proc_fee=='')
            $this->enquiry->mortgage_proc_fee = '0';
        if ($this->enquiry->insurance=='')
            $this->enquiry->insurance = '0';
        $this->enquiry->save();
        //redirect()->to('/edit-page-home/'.$this->home->slug);
        session()->flash('message', 'broker notes successfully updated.');
    }

    public function render()
    {
        return view('livewire.broker-notes');
    }
}
