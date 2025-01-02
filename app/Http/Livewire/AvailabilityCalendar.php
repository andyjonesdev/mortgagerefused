<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Calendar;
use App\Models\UnavailableDay;
use App\Models\User;
// use Livewire\Attributes\On; 

class AvailabilityCalendar extends Component
{
    public Calendar $calendar;
    public $available_days;
    public $current_year;
    public $current_month;
    public $show_back_arrow;
    public $show_forward_arrow;
    public $broker_id;
    public $broker_name;
    public $read_only;
    public $years;
    public $days_in_month;
    public $months;
    protected $listeners = ['saved' => 'updateAvailability']; // This is how to listen for an event in Livewire V2

    public function mount($broker_id, $read_only)
    {
        $this->broker_id = $broker_id;
        $user = User::where('id', $this->broker_id)->first();
        $this->broker_name = $user->name.' '.$user->surname;
        $this->read_only = $read_only;
        $this->current_year = date('Y');
        $this->current_month = date('m');
        $this->show_back_arrow = true;
        $this->show_forward_arrow = true;
        $this->getData();
    }

    function getData() {
        $this->calendar = Calendar::where('broker_id', $this->broker_id)->first();
        // echo '$calendar->id = '.$this->calendar->id;
        $unavailable_days = UnavailableDay::where('calendar_id', $this->calendar->id)->orderby('year','ASC')->orderby('month','ASC')->orderby('day','ASC')->get();
        //echo($unavailable_days);
        // $days = array();    
        // $obj = new \stdClass();    
        $this->available_days = collect([]);
        $this->years = array(date('Y'),date('Y')+1,date('Y')+2);
        $this->days_in_month = array(31,28,31,30,31,30,31,31,30,31,30,31);
        $this->months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

        //Loop through all years in the years array
        for ($y = 0; $y<count($this->years); $y++) {
            //Loop through all months in the year
            for ($m = 0; $m<count($this->months); $m++) {
                $month_list = array();
                //Loop through all days in the month
                for ($i = 1; $i<=$this->days_in_month[$m]; $i++) {
                    $obj = (object)[];
                    $obj->year = $this->years[$y];
                    $obj->month = $m + 1;
                    $obj->month_name = $this->months[$m];
                    $obj->day = $i;
                    $obj->available = 1;
                    $obj->date_display = date('jS', strtotime($obj->year."-".$obj->month."-".$obj->day));

                    if ($i == 1) {
                        //Add extra blank days
                        $days_to_add = date('w', strtotime($obj->year."-".$obj->month."-01")) - 1;
                        $last_day = date('t', strtotime($obj->year."-".$obj->month."-01"));
                        $day_of_week_end = date('w', strtotime($obj->year."-".$obj->month."-".$last_day));
                        if ($days_to_add==-1)
                            $days_to_add = 6;

                        //Extra blank days at the start of the month
                        $obj->extra_days = array();
                        for ($a = 0; $a<$days_to_add; $a++) {
                            $obj->extra_days[] = '';
                        }

                        //Extra blank days at the end of the month
                        if ($day_of_week_end==0)
                            $day_of_week_end = 7;
                        $days_to_add_end = 7 - $day_of_week_end;
                        $obj->extra_days_end = array();
                        for ($e = 0; $e<$days_to_add_end; $e++) {
                            $obj->extra_days_end[] = '';
                        }
                    }

                    //Loop through all the unavailable days and match them up
                    for ($u = 0; $u<count($unavailable_days); $u++) {
                        if ($unavailable_days[$u]->year==$this->years[$y] && $unavailable_days[$u]->month==($m+1) && $unavailable_days[$u]->day==$i)
                            $obj->available = 0;  
                    }
                    //$collection = collect([$obj]);
                    $month_list[] = $obj;
                }
                
                $this->available_days = $this->available_days->concat([$month_list]);
                $this->available_days->all();
            }
        }
    }

    // protected $rules = [
    //     'enquiry.year' => 'required',
    //     'enquiry.month' => 'required',
    //     'enquiry.day' => 'required|min:1',
    // ];

    //#[On('saved')] // This is how to listen for an event in Livewire V3
    public function updateAvailability($year,$month,$day)
    {
        $this->consoleLog('year = '.$year);
        $this->consoleLog('month = '.$month);
        $this->consoleLog('day = '.$day);
        $unavailable_day_check = UnavailableDay::where('calendar_id', $this->calendar->id)->where('year', $year)->where('month', $month)->where('day', $day)->first();
        if ($unavailable_day_check) {
            $unavailable_day_check->delete();
        }
        else {
            $ad = new UnavailableDay();
            $ad->calendar_id = $this->calendar->id;
            $ad->year = $year;
            $ad->month = $month;
            $ad->day = $day;
            // $this->reset('available_days');
            $ad->save();
        }
        //redirect()->to('/calendar');
        // $this->render();
    }

    public function decreaseMonth()
    {
        if ($this->current_month=='1') {
            $this->current_month = 12;
            $this->current_year--;
        }
        else {
            $this->current_month--;
        }
        if ($this->current_month=='1' && $this->current_year==$this->years[0]) {
            $this->show_back_arrow = false;
        }
        else {
            $this->show_back_arrow = true;
        }
        $this->showHideArrows();
    }

    public function increaseMonth()
    {
        if ($this->current_month=='12') {
            $this->current_month = 1;
            $this->current_year++;
        }
        else {
            $this->current_month++;
        }
        $this->showHideArrows();
    }

    public function showHideArrows()
    {
        if ($this->current_month=='1' && $this->current_year==$this->years[0]) {
            $this->show_back_arrow = false;
        }
        else {
            $this->show_back_arrow = true;
        }
        if ($this->current_month=='12' && $this->current_year==$this->years[count($this->years)-1]) {
            $this->show_forward_arrow = false;
        }
        else {
            $this->show_forward_arrow = true;
        }
    }

    public function render()
    {
        $this->getData();
        return view('livewire.availability-calendar');
    }
}
