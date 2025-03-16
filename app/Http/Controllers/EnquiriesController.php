<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\User;
use App\Mail\BrokerAssigned;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
// use Spatie\Permission\Models\Role;

/*
* Managing the brokers list, viewing, updating, assigning brokers
*/

class EnquiriesController extends Controller
{
    public function enquiries_list($filter_status,$filter_broker) {

        $user = auth()->user();
        $is_broker = $user->hasRole('broker');
        if ($filter_status=='all') {
            if ($is_broker) {
                $enquiries = Enquiry::where('email','!=','')->where('user_id',$user->id)->get();
            }
            else {
                if ($filter_broker==0) {
                    $enquiries = Enquiry::where('email','!=','')->orderby('created_at','DESC')->get();
                }
                else {
                    $enquiries = Enquiry::where('email','!=','')->where('user_id',$filter_broker)->orderby('created_at','DESC')->get();
                }
            }
        }
        else {
            $filter_status = str_replace('-',' ',$filter_status);
            $filter_status = ucwords($filter_status);
            if ($is_broker) {
                $enquiries = Enquiry::where('email','!=','')->where('status',$filter_status)->where('user_id',$user->id)->get();
            }
            else {
                if ($filter_broker==0) {
                    $enquiries = Enquiry::where('email','!=','')->where('status',$filter_status)->orderby('created_at','DESC')->get();
                }
                else {
                    $enquiries = Enquiry::where('email','!=','')->where('user_id',$filter_broker)->where('status',$filter_status)->get();
                }
            }
        }
        // echo $filter_status;
        $enquiries_to_delete = Enquiry::where('email','')->get();
        foreach ($enquiries_to_delete as $enquiry_to_delete) {
            $enquiry_to_delete->delete();
        }
        foreach ($enquiries as $enquiry) {
            $enquiry->date = date_format($enquiry->created_at,"d/m/Y");
            if (intval($enquiry->user_id)>0) {
                $enquiry_broker = User::where('id',$enquiry->user_id)->first();
                if ($enquiry_broker)
                    $enquiry->broker_name = $enquiry_broker->name.' '.$enquiry_broker->surname;
            }
        }
        
        $brokers_select = User::role('broker')->get();
        
        return view('/cms/enquiries',['enquiries'=>$enquiries, 'brokers_select'=>$brokers_select, 'statuses'=>$this->getStatuses(), 
        'filter_status'=>$filter_status, 'filter_broker'=>$filter_broker, 'is_broker'=>$is_broker]);
    }

    public function view($id) {
        $enquiry = Enquiry::where('id', $id)->first();
        $enquiry->value = number_format($enquiry->value);
        $enquiry->borrow = number_format($enquiry->borrow);
        $enquiry->income = number_format($enquiry->income);

        if ($enquiry->bankruptcy)
            $enquiry->bankruptcy = 'Yes';
        else
            $enquiry->bankruptcy = 'No';

        if ($enquiry->debt)
            $enquiry->debt = 'Yes';
        else
            $enquiry->debt = 'No';

        if ($enquiry->ccj)
            $enquiry->ccj = 'Yes';
        else
            $enquiry->ccj = 'No';

        if ($enquiry->missed)
            $enquiry->missed = 'Yes';
        else
            $enquiry->missed = 'No';

        if ($enquiry->trading_12_months!='Yes')
            $enquiry->trading_12_months = 'n/a';

        $broker = User::where('id',$enquiry->user_id)->first();
        $brokers_select = User::role('broker')->get();
        $user = auth()->user();
        $is_admin = $user->hasRole('admin');
        $is_super_admin = $user->hasRole('super admin');
        
        return view('/cms/enquiry',['enquiry'=>$enquiry, 'is_super_admin'=>$is_super_admin, 'is_admin'=>$is_admin, 'broker'=>$broker, 'statuses'=>$this->getStatuses(), 'brokers_select'=>$brokers_select]);
    }

    public function updateBrokerNotes(Request $req) {
        $enquiry = Enquiry::where('id', $req->id)->first();
        $enquiry->client_fee_upfront = $req->client_fee_upfront;
        $enquiry->client_fee_offer = $req->client_fee_offer;
        $enquiry->mortgage_proc_fee = $req->mortgage_proc_fee;
        $enquiry->insurance = $req->insurance;
        $enquiry->solicitor = $req->solicitor;
        $enquiry->secured_loan_hand_off = $req->secured_loan_hand_off;
        $enquiry->save();
        return redirect('/enquiry/'.$req->id);
    }
    
    public function delete($id) {
        $data = Enquiry::find($id);
        $data->delete();
        return redirect('/enquiries/all');
    }

    public function getStatuses() {
        $statuses = array('Open',
        'Contact Attempt 1',
        'Contact Attempt 2',
        'Contact Attempt 3',
        'Contact Made Awaiting Credit Report',
        'Enquiry Proceeding',
        'Sale Made AIP',
        'Sale Made Full Application',
        'Sale Made Offer',
        'Sale Made Secured Loan Hand off ',
        'Completed',
        'AWOL',
        'Hoax/Invalid Number',
        'No Longer Proceeding',
        'FCR Customer Not Ready',
        'FCR - Not Possible Until This Date',
        'Appointment Booked');
        return $statuses;
    }

    public function reAssignBroker(Request $req) {
        $new_broker = User::where('id', $req->broker_id)->first();
        $enquiry = Enquiry::where('id', $req->enquiry_id)->first();
        $enquiry->user_id = $new_broker->id;
        $enquiry->save();
        Mail::to($new_broker->email)->send(new BrokerAssigned($enquiry,$new_broker));
        return redirect('/enquiry/'.$req->enquiry_id);
    }

    public function exportData(Request $req) {
        $start_date = $req->start.' 00:00:00';
        $end_date = $req->end.' 00:00:00';
        // echo 'start_date = '.$start_date;
        // echo '<br>end_date = '.$end_date;
        $enquiries = Enquiry::where('created_at','>=',$start_date)->where('created_at','<=',$end_date)->get();

        $csvFileName = 'enquiries_'.str_replace('-','_',$req->start).'_to_'.str_replace('-','_',$req->end).'.csv';
        // echo '<br>csvFileName = '.$csvFileName;
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen("php://temp", "r+");

        fputcsv($handle, [
            'Date', 
            'Enquiry Id', 
            'Status',
            'Purpose',
            'Value',
            'Borrow',
            'Borrow Percentage',
            'Bankruptcy',
            'Debt',
            'Dcj',
            'Missed',
            'Elsewhere',
            'Other',
            'Employment Status',
            'Income',
            'Trading',
            'Trading 12 Months',
            'Callback',
            'First Name',
            'Surname',
            'Mobile',
            'Email',
            'Other Info',
            'Privacy',
            'Client Fee Upfront',
            'Clien Fee Offer',
            'Mortgage Proc Fee',
            'Insurance',
            'Solicitor',
            'Secured Loan Hand Off',
            'Notes Message'
        ]);
        
        foreach ($enquiries as $enquiry) {
            $enquiry->bankruptcy = $this->convertBoolean($enquiry->bankruptcy);
            $enquiry->debt = $this->convertBoolean($enquiry->debt);
            $enquiry->ccj = $this->convertBoolean($enquiry->ccj);
            $enquiry->missed = $this->convertBoolean($enquiry->missed);
            $enquiry->elsewhere = $this->convertBoolean($enquiry->elsewhere);
            $enquiry->other = $this->convertBoolean($enquiry->other);
            $enquiry->trading = $this->convertBoolean($enquiry->trading);
            // echo 'enquiry->trading = '.$enquiry->trading;
            // echo ', enquiry->trading = '.$enquiry->status;
            fputcsv($handle, [
                $enquiry->created_at,
                $enquiry->id,
                $enquiry->status,
                $enquiry->purpose,
                $enquiry->value,
                $enquiry->borrow,
                $enquiry->borrow_percentage,
                $enquiry->bankruptcy,
                $enquiry->debt,
                $enquiry->ccj,
                $enquiry->missed,
                $enquiry->elsewhere,
                $enquiry->other,
                $enquiry->employment_status,
                $enquiry->income,
                $enquiry->trading,
                $enquiry->trading_12_months,
                $enquiry->callback,
                $enquiry->first_name,
                $enquiry->surname,
                $enquiry->mobile,
                $enquiry->email,
                $enquiry->other_info,
                $enquiry->privacy,
                $enquiry->client_fee_upfront,
                $enquiry->client_fee_offer,
                $enquiry->mortgage_proc_fee,
                $enquiry->insurance,
                $enquiry->solicitor,
                $enquiry->secured_loan_hand_off,
                $enquiry->notes_message
            ]);
        }

        // Rewind the memory stream
        rewind($handle);
        // Capture the CSV data from the stream
        $csvData = stream_get_contents($handle);
        // Close the memory stream
        fclose($handle);

        // Return the response with the CSV data and headers
        return Response::make($csvData, 200, $headers);
    }

    public function convertBoolean($boolean) {
        if ($boolean) {
            $boolean = 'Yes';
        }
        else {
            $boolean = 'No';
        }
        return $boolean;
    }
}
