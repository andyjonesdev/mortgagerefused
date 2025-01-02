<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Enquiry;
use App\Mail\StatusChange;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

class EnquiryStatusSelect extends Component
{
    public Enquiry $enquiry;
    public $statuses;
    public $status_message = '';
    public $enquiry_id;
    public $send_email = true;

    public function mount($enquiry, $statuses)
    {
        $this->enquiry = $enquiry;
        $this->statuses = $statuses;
    }
 
    protected $rules = [
        'enquiry.status' => '',
    ];
 
    public function save()
    {
        $this->validate();
        $this->enquiry->save();
    }

    public function changeEvent($value)
    {
        $this->consoleLog('change event, value = '.$value);
        $this->consoleLog('change event, email = '.$this->enquiry->email);
        $this->consoleLog('change event, enquiry_id = '.$this->enquiry_id);
        $this->enquiry->status = $value;

        if ($this->enquiry->status=='Contact Attempt 1') {
            $this->status_message = "Your advisor has tried to contact you. They have left their details and emailed over all their contact details. Please arrange a time with them directly to discuss your enquiry further.";
        }
        else if ($this->enquiry->status=='Contact Attempt 2') {
            $send_email = false;
        }
        else if ($this->enquiry->status=='Contact Attempt 3') {
            $this->status_message = "Your Advisor has tried to contact you several times. Should you wish to discuss your situation and find out any information, please respond directly.";
        }
        else if ($this->enquiry->status=='Contact Made Awaiting Credit Report') {
            $send_email = false;
        }
        else if ($this->enquiry->status=='Enquiry Proceeding') {
            $send_email = false;
        }
        else if ($this->enquiry->status=='Sale Made AIP') {
            $this->status_message = "Great news! Your Mortgage Expert has successfully approached a lender on your behalf. If they haven't already done so, they will request some more details from you so that they can satisfy the lenders requirements and progress your case.";
        }
        else if ($this->enquiry->status=='Sale Made Full Application') {
            $this->status_message = "Congratulations, your advisor has found a lender suitable for you. We wish you the best of luck with the rest of your journey.";
        }
        else if ($this->enquiry->status=='Sale Made Offer') {
            $this->status_message = "Great news! Your mortgage offer is out! Your mortgage Expert will be in touch to take you through the next steps.";
        }
        else if ($this->enquiry->status=='Sale Made Secured Loan Hand off') {
            $this->status_message = "Thanks for your enquiry. Your Mortgage Expert has matched you with a second charge specialist and they will now take care of business for you. Feel free to update your broker with any progress.";
        }
        else if ($this->enquiry->status=='Completed') {
            $this->status_message = "We got there! Your case has now completed and for now your mortgage journey is at a successful end. Your mortgage expert will be in touch prior to your beneficial rate ending so that they can make sure you continue to get the best help & mortgage available to you. If you haven't already done so, please leave a review for Mortgage Refused: https://uk.trustpilot.com/review/mortgagerefused.com";
        }
        else if ($this->enquiry->status=='AWOL') {
            $this->status_message = "Your Mortgage Expert has not heard from you for a while. If you are looking to move forward with your mortgage but can't do so right away, just get in touch with them so that they can pop you in their diary for future contact.";
        }
        else if ($this->enquiry->status=='Hoax/Invalid Number') {
            $this->status_message = "Congratulations, your advisor has found a lender suitable for you. We wish you the best of luck with the rest of your journey.";
        }
        else if ($this->enquiry->status=='No Longer Proceeding') {
            $send_email = false;
        }
        else if ($this->enquiry->status=='FCR Customer Not Ready') {
            $this->status_message = "We have heard you are not quite ready yet. No problem, your advisor will be in touch on a date you have agreed with them.";
        }
        else if ($this->enquiry->status=='FCR - Not Possible Until This Date') {
            $this->status_message = "Your Mortgage Expert has advised you of when they will be in touch so that they can proceed with your enquiry. If your situation changes in the meantime, please contact them as this may allow your enquiry to proceed sooner.";
        }
        else if ($this->enquiry->status=='Appointment Booked') {
            $send_email = false;
        }

        $this->consoleLog('status_message = '.$this->status_message);
        $this->consoleLog('send_email = '.$this->send_email);

        if ($this->send_email) {
            try {
                Mail::to($this->enquiry->email)->send(new StatusChange($this->enquiry, $this->status_message));
                $this->enquiry->save();
            } catch(\Exception $e) {
                $this->consoleLog('Exception = '.$e->getMessage());
                $this->dispatchBrowserEvent('Exception', ['message' => $e->getMessage()]);
            }
        }
    }

    public function render()
    {
        return view('livewire.enquiry-status-select');
    }
}
