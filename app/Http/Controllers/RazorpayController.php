<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Doctor;
use App\Models\Patient;

class RazorpayController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        return redirect()->back();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentrazorpay(Request $request)
    {

        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        //After successfully payment
        // dd(session('drbooking'),session('patientid'),session('appdate'),session('drscheduleid')->starttime,$payment['amount']/100);
        // return redirect()->back();
        $app = new Appointment;
        $app->dr_id = session('drbooking');
        $app->patient_id = session('patientid');
        $app->purpose = session('purpose');
        $app->bookingdate = date("Y-m-d",strtotime(session('appdate')));
        $app->bookingtime = session('drscheduleid')->starttime;
        $app->bookingendtime = session('drscheduleid')->endtime;
        $app->razorpayid = $input['razorpay_payment_id'];
        $app->amountpaid = $payment['amount']/100;
        $app->save();

        $nf = new Notification;
        $nf->dr_id = session('drbooking');
        $nf->patient_id = session('patientid');
        $nf->paidamount = $payment['amount']/100;
        $nf->save();

        return redirect('patient/bookingsuccess');
    }

    public function bookingsuccess()
    {
        $app = Appointment::orderby('id','DESC')->first();
        $doctor = Doctor::where('id','=',session('drbooking'))->first();
        return view('patient.bookingsuccess',compact('app','doctor'));
    }

    public function invoice()
    {
        $app = Appointment::orderby('id','DESC')->first();
        $doctor = Doctor::where('id','=',session('drbooking'))->first();
        $patient = Patient::where('id','=',session('patientid'))->first();
        return view('patient.invoice',compact('app','doctor','patient'));
    }
}