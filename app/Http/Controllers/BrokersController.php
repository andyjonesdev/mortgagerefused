<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Enquiry;
use App\Models\Calendar;
use App\Models\UnavailableDay;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Mail\NewBroker;
use Illuminate\Support\Facades\Mail;

/*
* Functionality to add/edit/delete brokers on the main admin dashboard
*/

class BrokersController extends Controller
{
    public function add(Request $req) {
        $new_password = Str::random(10);

        $user_check = User::where('email', $req->email)->first();
        
        if ($user_check) {
            return redirect('/brokers/1');
        }
        else {
            $user = User::create([
                'name' => $req->first_name,
                'surname' => $req->surname,
                'email' => $req->email,
                'mobile' => $req->mobile,
                'status' => $req->status,
                'next_broker' => 0,
                'type' => 'broker',
                'password' => Hash::make($new_password),
            ]);

            $calendar = new Calendar;
            $calendar->broker_id = $user->id;
            $calendar->save();

            event(new Registered($user));
    
            $user->assignRole('broker');
        
            // $broker = new Broker;
            // $broker->first_name = $req->first_name;
            // $broker->surname = $req->surname;
            // $broker->email = $req->email;
            // $broker->mobile = $req->mobile;
            // $broker->status = $req->status;
            // $broker->save();

            Mail::to($req->email)->send(new NewBroker($user, $new_password));

            return redirect('/brokers/0');
        }
    }
    public function edit(Request $req) {
        $statuses = array('Available','Unavailable','Annual Leave');
        $broker = User::where('id', $req->id)->first();
        return view('cms/edit-broker',['broker_details'=>$broker, 'statuses'=>$statuses]);
    }
    public function update(Request $req) {
        $broker = User::where('id', $req->id)->first();
        $broker->name = $req->first_name;
        $broker->surname = $req->surname;
        $broker->email = $req->email;
        $broker->mobile = $req->mobile;
        $broker->status = $req->status;
        $broker->save();
        return redirect('/brokers/0');
    }
    public function list($duplicate) {
        $statuses = array('Available','Unavailable');
        $brokers = User::role('broker')->get();
        foreach ($brokers as $broker) {
            $broker->date = date_format($broker->created_at,"d/m/Y H:i:s");
            $broker->num_jobs = count(Enquiry::where('user_id', $broker->id)->get());
            $broker_calendar = Calendar::where('broker_id', $broker->id)->first();
            $unavailable_day = UnavailableDay::where('calendar_id', $broker_calendar->id)->where('year',date('Y'))->where('month',date('m'))->where('day',date('d'))->first();
            if ($unavailable_day)
                $broker->available_today = 'Unavailable';
            else
                $broker->available_today = 'Available';
        }
        return view('/cms/brokers',['brokers'=>$brokers, 'statuses'=>$statuses, 'duplicate'=>$duplicate]);
    }
    public function delete($user_id) {
        $user = User::where('id', $user_id)->first();
        $user->removeRole('broker');
        $user->delete();
        $calendar = Calendar::where('broker_id', $user_id)->first();
        $calendar->delete();
        return redirect('/brokers/0');
    }
}
