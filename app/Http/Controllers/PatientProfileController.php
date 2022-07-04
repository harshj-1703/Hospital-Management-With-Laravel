<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Favourite;

class PatientProfileController extends Controller
{

    public function goprofilesetting()
    {
        $userinfo = Patient::where('id','=',session('patientid'))->first();
        return view('patient.profilesetting',compact('userinfo'));
    }
    public function postprofilesetting(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required|max:30',
                'lastname' => 'required|max:30',
                'dob' => 'required|date|before:-1 years|after:01-01-1920',
                'gender' => 'required|in:M,F,O',
                'groupofblood' => 'required|in:A-,A+,B-,B+,AB-,AB+,O-,O+',
                'address' => 'max:200',
                'city' => 'max:30',
                'state' => 'max:30',
                'pincode' => 'max:10',
                'country' => 'max:30',
                'profileimage' => 'image|mimes:jpg,png,jpeg,gif',
            ]);

            if($request->profileimage != null)
            {
                $path = $request->profileimage->store('public/patientprofile');
                Patient::where('id',session('patientid'))->
                update(array('profileimage'=>($request->profileimage->store('patientprofile')),'firstname'=>strtoupper($request->firstname),
                'lastname'=>strtoupper($request->lastname),
                'gender'=>($request->gender),'dob'=>($request->dob),'address'=>($request->address),'city'=>strtoupper($request->city),
                'state'=>strtoupper($request->state),'country'=>strtoupper($request->country),'pincode'=>($request->pincode),
                'groupofblood'=>($request->groupofblood)));

                $patient = Patient::where('id',session('patientid'))->first();
                $request->session()->put('profileimage',$patient->profileimage);
                $request->session()->put('patientlocation',$patient->city.",".$patient->state.",".$patient->country);
                $request->session()->put('patientname',$patient->firstname." ".$patient->lastname);
                $request->session()->put('patientdob',$patient->dob);

                \Storage::deleteDirectory('patientprofile');
            }
            else
            {
                Patient::where('id',session('patientid'))->
                update(array('firstname'=>strtoupper($request->firstname),
                'lastname'=>strtoupper($request->lastname),
                'gender'=>($request->gender),'dob'=>($request->dob),'address'=>($request->address),'city'=>strtoupper($request->city),
                'state'=>strtoupper($request->state),'country'=>strtoupper($request->country),'pincode'=>($request->pincode),
                'groupofblood'=>($request->groupofblood)));
                $patient = Patient::where('id',session('patientid'))->first();
                $request->session()->put('patientlocation',$patient->city.",".$patient->state.",".$patient->country);
                $request->session()->put('patientname',$patient->firstname." ".$patient->lastname);
                $request->session()->put('patientdob',$patient->dob);
            }
        // dd($request->all());
        return redirect()->back()->with('message', 'Profile Edited Successfully.');
    }

    public function gochangepassword()
    {
        return view('patient.changepassword');
    }

    public function postchangepassword(Request $request)
    {
        $request->validate(
            [
                'oldpassword' => 'required|min:8',
                'newpassword' => 'required|min:8',
                'confirmpassword' => 'required|min:8|same:newpassword',
            ]);

            if(\Auth::attempt(['id' => session('userid') , 'password' => $request->oldpassword], $request->get('remember')))
            {
                $password = bcrypt($request['newpassword']);
                User::where('id',session('userid'))->update(array('password'=>$password));
                Patient::where('userid',session('userid'))->update(array('password'=>$password));
                // dd($password);
                return redirect()->back()->with('message', 'Password changed successfully.');
            }
            else
            {
                return redirect()->back()->withErrors([
                    'oldpassword' => 'Old Password is Wrong.',
                ]);
            }
    }

    public function favourite()
    {
        $fav = Favourite::with('doctors')->where('patient_id','=',session('patientid'))
        ->where('status','=','1')->get();
        return view('patient.favourites',compact('fav'));
    }
}
