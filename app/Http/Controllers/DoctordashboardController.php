<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Review;
use Carbon\Carbon;

class DoctordashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Kolkata');
        $totalpatient = Appointment::where('dr_id','=',session('drid'))->distinct('patient_id')->count();
        $totalpatienttoday = Appointment::where('dr_id','=',session('drid'))
        ->where('bookingdate','=',date("Y-m-d"))->distinct('patient_id')->count();
        $totalappointments = Appointment::where('dr_id','=',session('drid'))
        ->where('status','=','1')->where('bookingdate','=',date("Y-m-d"))->count();

        $drapp = Appointment::with('patients')->where('bookingdate','>',date("Y-m-d"))->
        where('dr_id','=',session('drid'))->orderby('bookingdate','ASC')->get();
        $drapptoday = Appointment::with('patients')->where('bookingdate','=',date("Y-m-d"))
        ->where('bookingtime','>',date("H:i:s"))->where('dr_id','=',session('drid'))->get();

        if($totalpatient > 0 && $totalpatienttoday > 0 && $totalappointments > 0)
        {
            //total patient bar
            $totalpatientstatusone = Appointment::where('dr_id','=',session('drid'))
            ->distinct('patient_id')->where('status','=','1')->count();
            $totalpatientbar = ($totalpatientstatusone/$totalpatient) * 100;

            //total patient today bar
            $totalpatienttodaystatusone = Appointment::where('dr_id','=',session('drid'))->where('status','=','1')
            ->where('bookingdate','=',date("Y-m-d"))->distinct('patient_id')->count();
            $totalpatientbartoday = ($totalpatienttodaystatusone/$totalpatienttoday) * 100;

            //appointments bar
            $totalappointmentsstatusone = Appointment::where('dr_id','=',session('drid'))->where('status','=','1')
            ->where('bookingdate','=',date("Y-m-d"))->count();
            $totalappointmentsbar = ($totalappointmentsstatusone/$totalappointments) * 100;

            // echo "<pre>";
            // print_r($drapp);
            // dd("Wow");
            return view('doctor.dashboard',compact('totalpatient','totalpatienttoday','totalpatientbar','totalpatientbartoday'
            ,'totalappointments','drapp','drapptoday','totalappointmentsbar'));
        }
        else{
            return view('doctor.dashboard',compact('totalpatient','totalpatienttoday'
            ,'totalappointments','drapp','drapptoday'));
        }
    }

    public function confirmschedule($id)
    {
        Appointment::where('id','=',$id)->update(array('status' => '1'));
        return redirect()->back();
    }
    public function cancleschedule($id)
    {
        Appointment::where('id','=',$id)->update(array('status' => '0'));
        return redirect()->back();
    }
    public function resetschedule($id)
    {
        Appointment::where('id','=',$id)->update(array('status' => '2'));
        return redirect()->back();
    }

    public function mypatients()
    {
        $patients = Appointment::with('patients')->where('dr_id','=',session('drid'))->where('status','=','1')->distinct()->get(['patient_id']);
        // dd($patients);
        return view('doctor.mypatients',compact('patients'));
    }

    public function appointments()
    {
        $drapp = Appointment::with('patients')->where('bookingdate','>',date("Y-m-d"))
        ->where('dr_id','=',session('drid'))->orderby('bookingdate','ASC')->get();
        return view('doctor.appointments',compact('drapp'));
    }
    public function lastappointments()
    {
        $drapp = Appointment::with('patients')->where('bookingdate','<',date("Y-m-d"))
        ->where('dr_id','=',session('drid'))->orderby('bookingdate','ASC')->get();
        return view('doctor.lastappointments',compact('drapp'));
    }
    public function missed($id)
    {
        Appointment::where('id','=',$id)->update(array("appointmentstatus" => "0"));
        return redirect()->back();
    }
    public function notmissed($id)
    {
        Appointment::where('id','=',$id)->update(array("appointmentstatus" => "1"));
        return redirect()->back();
    }

    public function allinvoices()
    {
        $invoices = Appointment::with('patients')->where('dr_id','=',session('drid'))->get();
        $doctor = Doctor::where('id','=',session('drid'))->first();
        return view('doctor.invoices',compact('invoices','doctor'));
    }

    public function invoicebyid($id)
    {
        $app = Appointment::where('id','=',$id)->first();
        $doctor = Doctor::where('id','=',$app->dr_id)->first();
        $patient = Patient::where('id','=',$app->patient_id)->first();
        return view('doctor.invoicedetail',compact('app','doctor','patient'));
    }

    public function reviews()
    {
        $doctor = Doctor::with('reviews')->where('status','=','1')->get();
        $review = Review::with('doctors')->with('patients')->where('dr_id','=',session('drid'))->
        orderby('id','DESC')->where('parent_id','=','0')->where('status','=','1')->get();
        return view('doctor.reviews',compact('doctor','review'));
    }

    public function mainreply(Request $request)
    {
        $request->validate(
            [
                // 'mainreplyrating' => 'required',
                'mainreplytitle' => 'required|max:100|min:5',
                'mainreplydetail' => 'required|max:200|min:10',
                'mainreplycondition' => 'required',
            ]
        );
        $mention = Review::with('patients')->with('doctors')->
        where('id','=',$request->mainreplyhiddenparent)->first();
        $rev = new Review;
        $rev->patient_id = session('patientid');
        $rev->dr_id = $request->mainreplyhiddendrid;
        $rev->parent_id = $request->mainreplyhiddenparent;
        if($request->mainreplyrating == 'star1'){
            $rev->star = "1";
        }else if($request->mainreplyrating == 'star2'){
            $rev->star = "2";
        }else if($request->mainreplyrating == 'star3'){
            $rev->star = "3";
        }else if($request->mainreplyrating == 'star4'){
            $rev->star = "4";
        }else{
            $rev->star = "5";
        }
        $rev->title = "@".$mention->patients->firstname." ".$mention->patients->lastname." , ".$request->mainreplytitle;
        $rev->detail = $request->mainreplydetail;
        $rev->save();

        return redirect()->back();
    }
}
