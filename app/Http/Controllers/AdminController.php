<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Review;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $doctor = Doctor::with('reviews')->with('appointments')->where('status','=','1')->get();
        $patient = Patient::with('appointments')->where('status','=','1')->get();
        $app = Appointment::with('doctors')->with('patients')->orderby('id','DESC')->get();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.index',compact('doctor','patient','app','notification'));
    }

    public function doapp($id)
    {
        $check = Appointment::where('id','=',$id)->first();
        if($check->status == '0')
        {
            Appointment::where('id','=',$id)->update(array('status' => '1'));
        }
        else
        {
            Appointment::where('id','=',$id)->update(array('status' => '0'));
        }
        return redirect()->back();
    }

    public function appointments()
    {
        $app = Appointment::with('doctors')->with('patients')->orderby('id','DESC')->get();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.appointmentlist',compact('app','notification'));
    }

    public function doctors()
    {
        $doctor = Doctor::orderby('id','DESC')->get();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.doctorlist',compact('doctor','notification'));
    }

    public function drstatus($id)
    {
        $dr = Doctor::where('id','=',$id)->first();
        if($dr->status == "1")
        {
            Doctor::where('id','=',$id)->update(array('status' => '0'));
        }
        else
        {
            Doctor::where('id','=',$id)->update(array('status' => '1'));
        }
        return redirect()->back();
    }

    public function patients()
    {
        $patient = Patient::orderby('id','DESC')->get();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.patientlist',compact('patient','notification'));
    }

    public function reviews()
    {
        $review = Review::with('doctors')->with('patients')->where('patient_id','!=',null)
        ->where('status','=','1')->get();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.reviews',compact('review','notification'));
    }

    public function deletereview($id)
    {
        Review::where('id','=',$id)->update(array('status' => '0'));
        return redirect()->back();
    }

    public function transections()
    {
        $app = Appointment::with('patients')->get();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.transectionlist',compact('app','notification'));
    }

    public function deletetransections($id)
    {
        Appointment::where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function invoicebyid($id)
    {
        $app = Appointment::with('doctors')->with('patients')->where('id','=',$id)->first();
        return view('admin.invoice',compact('app'));
    }
    
    public function profile()
    {
        $admin = Admin::where('id','=',session('adminid'))->first();
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.profile',compact('admin','notification'));
    }

    public function profileupdate(Request $request)
    {
        $request->validate(
            [
                'file' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'dob' => 'required|max:50',
                'address' => 'required|max:100',
                'city' => 'required|max:20',
                'state' => 'required|max:20',
                'country' => 'required|max:20',
                'pincode' => 'required|digits_between:2,8',
            ]);

        if($request->file != null)
        {
            $path = $request->file->store('public/adminprofile');
            Admin::where('id','=',session('adminid'))->
            update(array('profileimage' => $request->file->store('adminprofile'),
            'firstname' => $request->firstname , 'lastname' => $request->lastname ,
            'dob' => $request->dob , 'address' => $request->address,
            'city' => $request->city , 'state' => $request->state,
            'pincode' => $request->pincode , 'country' => $request->country));

            $admin = Admin::where('id',session('adminid'))->first();
            $request->session()->put('adminprofile',$admin->profileimage);
            $request->session()->put('adminname',strtoupper($admin->firstname)." ".strtoupper($admin->lastname));
            \Storage::deleteDirectory('adminprofile');
        }
        else
        {
            Admin::where('id','=',session('adminid'))->
            update(array('firstname' => $request->firstname , 'lastname' => $request->lastname ,
            'dob' => $request->dob , 'address' => $request->address,
            'city' => $request->city , 'state' => $request->state,
            'pincode' => $request->pincode , 'country' => $request->country));
            $admin = Admin::where('id',session('adminid'))->first();
            $request->session()->put('adminname',strtoupper($admin->firstname)." ".strtoupper($admin->lastname));
        }

        return redirect()->back()->with('message', 'Profile Edited Successfully.');
    }

    public function passwordupdate(Request $request)
    {   
        $request->validate(
            [
                'oldpassword' => 'required|min:8|max:20',
                'newpassword' => 'required|min:8|max:20',
                'confirmpassword' => 'required|min:8|max:20|same:newpassword',
            ]);

        if(\Auth::attempt(['id' => session('userid') , 'password' => $request->oldpassword]
        , $request->get('remember')))
        {
            $password = bcrypt($request['newpassword']);
            User::where('id',session('userid'))->update(array('password'=>$password));
            Admin::where('userid',session('userid'))->update(array('password'=>$password));
            return redirect()->back()->with('pmessage', 'Password changed successfully.');
        }
        else
        {
            return redirect()->back()->withErrors([
                'oldpassword' => 'Old Password is Wrong.',
            ]);
        }
    }

    public function adddoctor(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:users|min:6',
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'dob' => 'required|max:50',
                'password' => 'required|min:8|max:20',
                'confirmpassword' => 'required|min:8|max:20|same:password',
                'email' => 'required|unique:users|email',
                'phoneno' => 'required|unique:users|digits:10',
            ]);

            $data = $request->all();
            $data['username'] = strtolower($request['username']);
            $data['password'] = bcrypt($request['password']);
    
            //with using fillable private attribute in model
            $user = new User($data);
            $user->status = '2';
            $user->save();
    
            $doctor = new Doctor($data);
            $doctor->userid = $user->id;
            $doctor->status = "1";
            $doctor->save();

            return redirect()->back()->with('message', 'Doctor Added Successfully.');
    }

    public function clearnotifications()
    {
        Notification::truncate();
        return redirect()->back();
    }
}