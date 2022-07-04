<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Clinicimage;

class PatientSearchController extends Controller
{
    public function searchAjax(Request $request)
    {
        $query = Doctor::where('status','=','1');
        if($request->param1!='')
        {
            if($request->param1=='all')
            {
                $doctor = $query;
            }
            else if($request->param1=='rating')
            {
                $doctor = $query->whereHas('reviews',function($q) {
                    $q->orderBy('star','desc');
                });
            }
            else if($request->param1=='latest')
            {
                $doctor = $query->orderBy('id','desc');
            }
            else if($request->param1=='price-lowtohigh')
            {
                $doctor = $query->orderBy('general_cons_price');
            }
            else if($request->param1=='price-hightolow')
            {
                $doctor = $query->orderBy('general_cons_price','desc');
            }
        }

        if($request->param2!='')
        {
            if($request->param2=='M'){
                $doctor = $doctor->where('gender','=','M');
            }
            else{
                $doctor = $doctor->where('gender','=','F');
            }
        }

        if($request->param3!='')
        {
            $doctor = $doctor->where('address1','LIKE','%'.$request->param3.'%')
            ->orwhere('address2','LIKE','%'.$request->param3.'%');
        }

        if($request->param4!='')
        {
            $doctor = $doctor->where('city','LIKE','%'.$request->param4.'%');
        }

        if($request->param5!='')
        {
            $doctor = $doctor->where('slug','LIKE','%'.$request->param5.'%');
        }

        if($request->param6!='')
        {
            $doctor = $doctor->where('slug','LIKE','%'.$request->param6.'%');
        }
        
        $doctor = $doctor->get();
        $html = view('patient.searchajax',compact('doctor'))->render();
        return response()->json($html, 200);
    }
    public function searchIndex(Request $request)
    {
        $location = $request->locationsearch;
        $drsearch = $request->drsearch;
        $query = Doctor::where('status','=','1');
        if($drsearch != null && $location == null)
        {
            $doctor = $query->where('slug','LIKE','%'.$drsearch.'%')
            ->orwhere('lastname','LIKE','%'.$drsearch.'%')
            ->orwhere('services','LIKE','%'.$drsearch.'%')
            ->orwhere('specialization','LIKE','%'.$drsearch.'%')
            ->orwhereHas('clinics',function($clinics) use($request) {
                $clinics->where('clinicname','like','%'.$request->drsearch.'%');
            })->get();
        }
        else if($location != null && $drsearch == null){
            $doctor = $query->where('city','LIKE','%'.$location.'%')
            ->orwhere('state','LIKE','%'.$location.'%')
            ->orwhere('country','LIKE','%'.$location.'%')
            ->orwhere('address1','LIKE','%'.$location.'%')
            ->orwhere('address2','LIKE','%'.$location.'%')
            ->orwhereHas('clinics',function($clinics) use($request) {
                $clinics->where('clinicaddress','like','%'.$request->locationsearch.'%');
            })->get();
        }
        else if($location != null && $drsearch != null){
            $doctor = $query
            ->where('slug','LIKE','%'.$drsearch.'%')
            ->orwhere('lastname','LIKE','%'.$drsearch.'%')
            ->orwhere('services','LIKE','%'.$drsearch.'%')
            ->orwhere('specialization','LIKE','%'.$drsearch.'%')
            ->orwhere('city','LIKE','%'.$location.'%')
            ->orwhere('state','LIKE','%'.$location.'%')
            ->orwhere('country','LIKE','%'.$location.'%')
            ->orwhere('address1','LIKE','%'.$location.'%')
            ->orwhere('address2','LIKE','%'.$location.'%')
            ->orwhereHas('clinics',function($clinics) use($request) {
                $clinics->where('clinicname','like','%'.$request->drsearch.'%');
                $clinics->orwhere('clinicaddress','like','%'.$request->locationsearch.'%');
            })->get();
        }
        else
        {
            $doctor = $query->get();
        }
        return view('patient.search',compact('doctor'));
    }

    public function indexget(Request $request)
    {
        $doctor = Doctor::where('status','=','1')->get();
        return view('patient.search',compact('doctor'));
    }
}
