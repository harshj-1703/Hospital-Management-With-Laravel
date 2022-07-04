<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Doctorschedule;

class BookingController extends Controller
{
    public function gobooking($id ,Request $request)
    {
        $doctor = Doctor::with('sunday')->with('monday')->with('tuesday')->with('wednesday')
        ->with('thursday')->with('friday')->with('saturday')->with('reviews')->where('id','=',$id)->first();
        $request->session()->put('drbooking',$doctor->id);
        return view('patient.doctorbooking',compact('doctor'));
    }

    public function fixschedule($id,Request $request)
    {
        $ds = Doctorschedule::where('id','=',$id)->where('status','=','1')->first();
        $patient = Patient::where('id','=',session('patientid'))->where('status','=','1')->first();
        $doctor = Doctor::where('status','=','1')->where('id','=',session('drbooking'))->first();
        // dd($ds->dayid);
        if($ds->dayid == date("w"))
        {
            // dd(date("d M Y"),$ds->starttime);
            $request->session()->put('appdate',date("d M Y"));
            $request->session()->put('drscheduleid',$ds);
        }
        else
        {
            if(date("w") < $ds->dayid)
            {
                // dd(($ds->dayid)-(date("w")));
                $dayplus = ($ds->dayid)-(date("w"));
                $day = $dayplus.' day';
                $request->session()->put('appdate',date("d M Y",strtotime($day)));
                $request->session()->put('drscheduleid',$ds);
                // dd(date("d M Y",strtotime($day)),$ds->starttime);
            }
            else
            {
                // dd(($ds->dayid)+7-(date("w")));
                $dayplus = ($ds->dayid)+7-(date("w"));
                $day = $dayplus.' day';
                $request->session()->put('appdate',date("d M Y",strtotime($day)));
                $request->session()->put('drscheduleid',$ds);
                // dd(date("d M Y",strtotime($day)),$ds->starttime);
            }
        }
        return view('patient.checkout',compact('doctor','ds','patient'));
    }

    public function checkout(Request $request)
    {
        // dd(session('drscheduleid'));
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phoneno' => 'required',
                'purpose' => 'required',
                // 'condition' => 'required',
            ]
        );
        $request->session()->put('purpose',$request->purpose);
        $patient = Patient::where('id','=',session('patientid'))->where('status','=','1')->first();
        $doctor = Doctor::where('id','=',session('drbooking'))->first();
        // $request->session()->put('doctorfees',$doctor->general_cons_price+10);
        return view('razorpay.index',compact('patient','doctor','request'));
        // dd($request->all());
    }
    public function checkoutback()
    {
        return redirect()->back();
    }
}