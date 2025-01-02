<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Enquiry;
use App\Models\User;
use App\Mail\NewEnquiry;
use App\Mail\EnquiryConf;
use App\Mail\BrokerAssigned;
use App\Models\Calendar;
use App\Models\UnavailableDay;
use Illuminate\Support\Facades\Mail;

class GetStarted extends Component
{
    public Enquiry $enquiry;
    public $stage;
    public $last_6_years = false;
    public $status_chosen = false;
    public $notready = false;
    public $sure = false;
    public $stages_complete = 0;
    public $privacy_message = false;
    public $question;

    public function mount()
    {
        $this->enquiry = new Enquiry();
        $this->enquiry->value = 500000;
        $this->enquiry->borrow = 1000;
        $this->enquiry->borrow_percentage = 1;
        // $this->enquiry->borrow_max = 300000;
        $this->enquiry->bankruptcy = false;
        $this->enquiry->debt = false;
        $this->enquiry->ccj = false;
        $this->enquiry->missed = false;
        $this->enquiry->elsewhere = false;
        $this->enquiry->other = false;
        $this->enquiry->employment_status = '';
        $this->enquiry->income = 0;
        $this->enquiry->trading = false;
        $this->enquiry->trading_12_months = '';
        $this->enquiry->callback = '';
        $this->enquiry->first_name = '';
        $this->enquiry->surname = '';
        $this->enquiry->mobile = '';
        $this->enquiry->email = '';
        $this->enquiry->other_info = '';
        $this->enquiry->privacy = false;
        $this->stage = 0;
    }

    protected $rules = [
        'enquiry.purpose' => 'required',
        'enquiry.value' => 'required',
        'enquiry.borrow' => 'required',
        'enquiry.borrow_percentage' => 'required',
        'enquiry.bankruptcy' => 'required',
        'enquiry.debt' => 'required',
        'enquiry.ccj' => 'required',
        'enquiry.missed' => 'required',
        'enquiry.elsewhere' => 'required',
        'enquiry.other' => 'required',
        'enquiry.employment_status' => 'required',
        'enquiry.income' => 'required',
        'enquiry.trading' => 'required',
        'enquiry.trading_12_months' => 'required',
        'enquiry.callback' => 'required',
        'enquiry.first_name' => 'required',
        'enquiry.surname' => 'required',
        'enquiry.mobile' => 'required',
        'enquiry.email' => 'required',
        'enquiry.other_info' => 'required',
        'enquiry.privacy' => 'required|min:1',
        'question' => 'required',
    ];

    protected $messages = [
        'enquiry.purpose.required' => 'Please select a box above',
        'enquiry.value.required' => 'Please select a value above',
        'enquiry.borrow.required' => 'Please select a value above',
        'enquiry.employment_status.required' => 'Please select a box above',
        'enquiry.trading_12_months.required' => 'Please select a box above',
        'enquiry.callback.required' => 'Please select a box above',
        'enquiry.privacy.required' => 'Please tick the privacy box',
        'question.required' => 'Please answer the question',
    ];
    
    public function save()
    {
        $this->consoleLog('-----------------------');
        $this->consoleLog('stage = '.$this->stage);
        $this->consoleLog('stages_complete = '.$this->stages_complete);
        // $this->consoleLog('purpose = '.$this->enquiry->purpose);
        // $this->consoleLog('value = '.$this->enquiry->value);
        // $this->consoleLog('borrow = '.$this->enquiry->borrow);
        // $this->consoleLog('bankruptcy = '.$this->enquiry->bankruptcy);
        // $this->consoleLog('debt = '.$this->enquiry->debt);
        // $this->consoleLog('ccj = '.$this->enquiry->ccj);
        // $this->consoleLog('missed = '.$this->enquiry->missed);
        // $this->consoleLog('employment_status = '.$this->enquiry->employment_status);
        $this->consoleLog('trading_12_months = '.$this->enquiry->trading_12_months);
        // $this->consoleLog('first_name = '.$this->enquiry->first_name);
        // $this->consoleLog('surname = '.$this->enquiry->surname);
        // $this->consoleLog('mobile = '.$this->enquiry->mobile);
        // $this->consoleLog('email = '.$this->enquiry->email);
        $this->consoleLog('other_info = '.$this->enquiry->other_info);
        $this->consoleLog('privacy = '.$this->enquiry->privacy);
        
          
        if ($this->stage==0)
            $this->validate(['enquiry.purpose' => 'required']);

        // if ($this->stage==1) {
        //     $this->enquiry->borrow_max = 0.9 * $this->enquiry->value;
        // }
        
        if($this->stage==1)
            $this->enquiry->borrow_percentage = $this->enquiry->borrow / $this->enquiry->value;
        
        if ($this->stage==3) {
            if (!$this->enquiry->bankruptcy && !$this->enquiry->debt && !$this->enquiry->ccj && !$this->enquiry->missed && !$this->enquiry->elsewhere && !$this->enquiry->other) {
                $this->consoleLog('nothing ticked!');
                $this->last_6_years = true;
            }
            else {
                $this->last_6_years = false;
            }
        }

        if ($this->stage==4) {
            $this->validate(['enquiry.employment_status' => 'required']);
            if ($this->enquiry->employment_status=='Self-Employed') {
                $this->validate(['enquiry.trading_12_months' => 'required']);
            }
            else {
                $this->enquiry->trading_12_months = 'n/a';
            }
        }

        if ($this->stage==6)
            $this->validate(['enquiry.callback' => 'required']);

        if ($this->stage==7) {
            $this->validate(['enquiry.first_name' => 'required']);
            $this->validate(['enquiry.surname' => 'required']);
            $this->validate(['enquiry.mobile' => 'required']);
            $this->validate(['enquiry.email' => 'required']);
            $this->validate(['enquiry.other_info' => 'required']);
            $this->validate(['enquiry.privacy' => 'required']);
            $this->validate(['question' => 'required']);
        }

        if ($this->stage==3) {
            if (!$this->last_6_years) {
                $this->stage++;
                $this->stages_complete++;
                $this->enquiry->save();
            }
        }
        else {
            if ($this->stage==6 && $this->enquiry->callback=='No') {
                // if ($this->enquiry->sure=='Yes') {

                // }
                $this->enquiry->save();
                redirect()->to('/enquiry-resubmit/');
            }
            else if ($this->stage==7) {
                if ($this->enquiry->privacy=='1') {
                    $this->stages_complete++;
                    //$this->stage = 9;
                    // $this->enquiry->save();

                    $today_year = date('Y');
                    $today_month = date('m');
                    $today_day = date('d');

                    //Work out which brokers are available
                    $brokers = User::role('broker')->get();
                    foreach ($brokers as $broker) {
                        $calendar = Calendar::where('broker_id', $broker->id)->first();
                        $unavailable = UnavailableDay::where('calendar_id', $calendar->id)
                        ->where('year', $today_year)
                        ->where('month', $today_month)
                        ->where('day', $today_day)->first();
                        $this->consoleLog('unavailable = '.$unavailable);
                        if ($unavailable)
                            $broker->status = 'Unavailable';
                        else
                            $broker->status = 'Available';
                        $broker->save();

                        $this->consoleLog('year = '.$today_year);
                        $this->consoleLog('month = '.$today_month);
                        $this->consoleLog('day = '.$today_day);
                        $this->consoleLog('broker status = '.$broker->status);
                    }

                    //Automatically assign enquiry to next available broker
                    // $brokers_available = User::role('broker')->where('status','Available')->get();
                    // $broker_with_least_jobs = User::where('status','Available')->orderBy('id', 'ASC')->first();
                    // $this->consoleLog('first broker = '.$broker_with_least_jobs->name);
                    // $lowest_job_count = count(Enquiry::where('user_id', $broker_with_least_jobs->id)->get());
                    // $this->consoleLog('lowest_job_count = '.$lowest_job_count);

                    // foreach ($brokers_available as $broker) {
                    //     $this->consoleLog('-----------');
                    //     $broker_num_jobs = count(Enquiry::where('user_id', $broker->id)->get());
                    //     $this->consoleLog('broker_num_jobs = '.$broker_num_jobs);
                    //     $this->consoleLog('lowest_job_count = '.$lowest_job_count);
                    //     $this->consoleLog('next broker = '.$broker->name);
                    //     if ($broker_num_jobs < $lowest_job_count) {
                    //         $broker_with_least_jobs = User::where('id', $broker->id)->first();
                    //         $this->consoleLog('broker_with_least_jobs = '.$broker_with_least_jobs->name);
                    //         $lowest_job_count = $broker_num_jobs;
                    //     }
                    // }
                    // $this->consoleLog('broker_with_least_jobs = '.$broker_with_least_jobs->name);

                    //Get broker who had the last broker flag
                    $last_broker = User::where('next_broker', '1')->first();
                    //Find the next broker who is available and whose id is greater than the last broker
                    $next_broker = User::where('status','Available')->where('id','>',$last_broker->id)->first();
                    //If no brokers found, find the first available broker (lowest id)
                    if (!$next_broker) {
                        $next_broker = User::where('status','Available')->first();
                    }
                    //Assign the last broker flag to the next broker
                    $next_broker->next_broker = 1;
                    $next_broker->save();
                    //Remove the last broker flag from the last broker
                    $last_broker->next_broker = 0;
                    $last_broker->save();
                    //Assign enquiry to the next broker
                    $this->enquiry->user_id = $next_broker->id;
                    $this->enquiry->save();
                    $this->consoleLog('user email = '.$next_broker->email);
                    Mail::to($next_broker->email)->send(new BrokerAssigned($this->enquiry,$next_broker));

                    if ($this->question=='G') {
                        //Change formats for emails
                        if ($this->enquiry->bankruptcy)
                            $this->enquiry->bankruptcy = 'Yes';
                        else
                            $this->enquiry->bankruptcy = 'No';

                        if ($this->enquiry->debt)
                            $this->enquiry->debt = 'Yes';
                        else
                            $this->enquiry->debt = 'No';

                        if ($this->enquiry->ccj)
                            $this->enquiry->ccj = 'Yes';
                        else
                            $this->enquiry->ccj = 'No';

                        if ($this->enquiry->missed)
                            $this->enquiry->missed = 'Yes';
                        else
                            $this->enquiry->missed = 'No';

                        if ($this->enquiry->elsewhere)
                            $this->enquiry->elsewhere = 'Yes';
                        else
                            $this->enquiry->elsewhere = 'No';

                        if ($this->enquiry->other)
                            $this->enquiry->other = 'Yes';
                        else
                            $this->enquiry->other = 'No';

                        Mail::to('info@mortgagerefused.com')->send(new NewEnquiry(number_format($this->enquiry->value),number_format($this->enquiry->borrow),$this->enquiry));
                        // Mail::to($this->enquiry->email)->bcc('mortgagerefused.com+70b0b38807@invite.trustpilot.com')->send(new EnquiryConf($this->enquiry));
                        
                        redirect()->to('/enquiry-thankyou/');
                    }
                }
                else {
                    $this->consoleLog('Please add privacy');
                    $this->privacy_message = true;
                }
            }
            else {
                $this->stage++;
                $this->stages_complete++;
                $this->enquiry->save();
            }
        }
    }

    public function render()
    {
        return view('livewire.get-started');
    }
}
