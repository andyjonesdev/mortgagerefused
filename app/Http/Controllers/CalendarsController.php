<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Calendar;
use App\Models\UnavailableDay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CalendarsController extends Controller
{
    public function view() {
        //$broker = Auth::login($user); //User::where('id',$enquiry->user_id)->first();
        $broker_id = Auth::user()->id;
        
        //$concatenated = $collection->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);
 
        // var_dump($obj);
        // $collection = collect([1, 2, 3]);
        // echo($available_days);
        // echo '$unavailable_days = '.$unavailable_days;
        $user = auth()->user();
        $is_broker = $user->hasRole('broker');
        return view('/cms/calendar',['broker_id'=>$broker_id, 'read_only'=>false, 'is_broker'=>$is_broker]);
    }
    public function view_with_id($broker_id) {
        $user = auth()->user();
        $is_broker = $user->hasRole('broker');
        return view('/cms/calendar',['broker_id'=>$broker_id, 'read_only'=>true, 'is_broker'=>$is_broker]);
    }
}
