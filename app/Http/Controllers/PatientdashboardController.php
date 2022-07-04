<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

class PatientdashboardController extends Controller
{
    public function godashboard()
    {
        $app = Appointment::with('doctors')->where('patient_id','=',session('patientid'))
        ->orderby('bookingdate','DESC')->get();
        $apps = Appointment::with('doctors')->where('patient_id','=',session('patientid'))
        ->orderby('bookingdate','DESC')->get();
        return view('patient.dashboard',compact('app','apps'));
    }

    public function invoicebyid($id)
    {
        $app = Appointment::with('doctors')->with('patients')->where('id','=',$id)->first();
        $doctor = Doctor::where('id','=',$app->dr_id)->first();
        $patient = Patient::where('id','=',$app->patient_id)->first();
        return view('patient.invoice',compact('app','doctor','patient'));
    }
}
