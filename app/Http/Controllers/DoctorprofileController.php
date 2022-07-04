<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Award;
use App\Models\Registration;
use App\Models\Experience;
use App\Models\Membership;
use App\Models\Clinic;
use App\Models\Clinicimage;
use App\Models\Socialmedia;
use App\Models\Doctorschedule;

class DoctorprofileController extends Controller
{
    public function profilesetting()
    {
        $userinfo = Doctor::with('educations')->with('experiences')->with('awards')->
        with('memberships')->with('registrations')->with('clinics')->where('id','=',session('drid'))->first();
        $userclinic = Clinic::with('clinicimages')->where('dr_id','=',session('drid'))->first();
        // dd($userclinic->clinicimages);
        // dd($userinfo->educations);
        return view('doctor.profilesetting',compact('userinfo'));
    }
    public function postprofilesetting(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'phoneno' => 'required|digits:10|unique:users,phoneno,'.session('userid').',id',
                'gender' => 'required',
                'dob' => 'required|date|before:-24 years|after:01-01-1960',
                'services' => 'max:200',
                'specialization' => 'max:200',
                'biography' => 'max:200',
                'city' => 'max:20',
                'country' => 'max:20',
                'state' => 'max:20',
                'pincode' => 'digits_between:1,9|integer',
                'address1' => 'max:200',
                'address2' => 'max:200',
                'general_cons_price' => 'digits_between:1,7|integer',
                'videocallprice' => 'digits_between:1,7|integer',
                'voicecallprice' => 'digits_between:1,7|integer',
                'degree.*' => 'required|max:30',
                'clg.*' => 'required|max:30',
                'yoc.*' => 'digits_between:0,4|integer',
                'hospital.*' => 'required|max:30',
                'hospitalfrom.*' => 'required|date',
                'hospitalto.*' => 'required|date',
                'hospitaldest.*' => 'required|max:30',
                'awards.*' => 'required|max:30',
                'awardyear.*' => 'digits_between:0,4|integer',
                'membership.*' => 'required|max:30',
                'registration.*' => 'required|max:30',
                'regyear.*' => 'digits_between:0,4|integer',
                'clinicname' => 'max:30',
                'clinicaddress' => 'max:30',
                'clinicupload.*' => 'image|mimes:jpg,png,jpeg,gif',
                'profileimage' => 'image|mimes:jpg,png,jpeg,gif',
            ]
        );

        // dd($request->all());

        if($request->profileimage != null)
        {
            $path = $request->profileimage->store('public/doctorprofile');
            $slug = strtolower($request->firstname."-".$request->lastname."-".session('drid'));
            Doctor::where('id',session('drid'))->
            update(array('profileimage'=>($request->profileimage->store('doctorprofile')),'firstname'=>strtoupper($request->firstname),'lastname'=>strtoupper($request->lastname),'phoneno'=>($request->phoneno),
            'gender'=>($request->gender),'dob'=>($request->dob),'biography'=>($request->biography),
            'address1'=>($request->address1),'address2'=>($request->address2),'city'=>($request->city),
            'state'=>($request->state),'country'=>($request->country),'pincode'=>($request->pincode),
            'general_cons_price'=>($request->general_cons_price),'videocallprice'=>($request->videocallprice),'voicecallprice'=>($request->voicecallprice),
            'services'=>($request->services),'specialization'=>($request->specialization),'slug'=>$slug));

            $doctor = Doctor::where('id',session('drid'))->first();
            // dd($doctor->profileimage);
            $request->session()->put('drprofileimage',$doctor->profileimage);
            $request->session()->put('drspecialist',strtoupper($doctor->specialization)." SPECIALIST");
            $request->session()->put('drname',$doctor->firstname." ".$doctor->lastname);

            \Storage::deleteDirectory('doctorprofile');
        }
        else
        {
            $doctor = new doctor;
            $slug = strtolower($request->firstname."-".$request->lastname."-".session('drid'));
            Doctor::where('id',session('drid'))->
            update(array('firstname'=>strtoupper($request->firstname),'lastname'=>strtoupper($request->lastname),'phoneno'=>($request->phoneno),
            'gender'=>($request->gender),'dob'=>($request->dob),'biography'=>($request->biography),
            'address1'=>($request->address1),'address2'=>($request->address2),'city'=>($request->city),
            'state'=>($request->state),'country'=>($request->country),'pincode'=>($request->pincode),
            'general_cons_price'=>($request->general_cons_price),'videocallprice'=>($request->videocallprice),'voicecallprice'=>($request->voicecallprice),
            'services'=>($request->services),'specialization'=>($request->specialization),'slug'=>$slug));

            $doctor = Doctor::where('id',session('drid'))->first();
            $request->session()->put('drname',$doctor->firstname." ".$doctor->lastname);
            $request->session()->put('drspecialist',strtoupper($doctor->specialization)." SPECIALIST");
        }

        //doctor Education
        if(Education::where('dr_id',session('drid'))->count() > 0)
        {
            Education::where('dr_id',session('drid'))->delete();
        }

        $degree = $request->degree;
        if($degree > 0)
        {
            for($i=0;$i<count($degree);$i++){
                $edu = new Education;
                $edu->degree = $request->degree[$i];
                $edu->clg = $request->clg[$i];
                $edu->yoc = $request->yoc[$i];
                $edu->dr_id = session('drid');
                $edu->save();
            }
        }

        //doctor Experience
        if(Experience::where('dr_id',session('drid'))->count() > 0)
        {
            Experience::where('dr_id',session('drid'))->delete();
        }

        $hospital = $request->hospital;
        if($hospital > 0)
        {
            for($i=0;$i<count($hospital);$i++){
                $exp = new Experience;
                $exp->hospital = $request->hospital[$i];
                $exp->from = $request->hospitalfrom[$i];
                $exp->to = $request->hospitalto[$i];
                $exp->desg = $request->hospitaldest[$i];
                $exp->dr_id = session('drid');
                $exp->save();
            }
        }

        //doctor Award
        if(Award::where('dr_id',session('drid'))->count() > 0)
        {
            Award::where('dr_id',session('drid'))->delete();
        }

        $award = $request->award;
        if($award > 0)
        {
            for($i=0;$i<count($award);$i++){
                $aw = new Award;
                $aw->awardname = $request->award[$i];
                $aw->year = $request->awardyear[$i];
                $aw->dr_id = session('drid');
                $aw->save();
            }
        }

        //doctor Membership
        if(Membership::where('dr_id',session('drid'))->count() > 0)
        {
            Membership::where('dr_id',session('drid'))->delete();
        }

        $mem = $request->membership;
        // dd($request->Membership[4]);
        if($mem > 0)
        {
            $count = count($mem);
            for($i=0;$i<$count;$i++)
            {
                $mem = new Membership;
                $mem->membership = $request->membership[$i];
                $mem->dr_id = session('drid');
                $mem->save();
            }
        }

        //doctor Registration
        if(Registration::where('dr_id',session('drid'))->count() > 0)
        {
            Registration::where('dr_id',session('drid'))->delete();
        }

        $reg = $request->registration;
        if($reg > 0)
        {
            $count1 = count($reg);
            for($i=0;$i<$count1;$i++){
                $reg = new Registration;
                $reg->registration = $request->registration[$i];
                $reg->year = $request->regyear[$i];
                $reg->dr_id = session('drid');
                $reg->save();
            }
        }

        if(Clinic::where('dr_id',session('drid'))->count() > 0)
        {
            Clinic::where('dr_id',session('drid'))
            ->update(array('clinicname'=>$request->clinicname , 'clinicaddress'=>$request->clinicaddress));
        }
        else{
            $Clinic = new Clinic;
            $Clinic->clinicname = $request->clinicname;
            $Clinic->clinicaddress = $request->clinicaddress;
            $Clinic->dr_id = session('drid');
            $Clinic->save();
        }

        $img = $request->clinicupload;
        if($img != null)
        {
            foreach($request->file('clinicupload') as $file)
            {
                $path = $file->store('public/clinicimages');
                $clinicimages = new Clinicimage;
                $clinicimages->clinicimages = $file->store('clinicimages');
                $userclinic = Clinic::where('dr_id','=',session('drid'))->first();
                $clinicimages->clinic_id = $userclinic->id;
                $clinicimages->save();
                \Storage::deleteDirectory('clinicimages');
            }
        }
        
        return redirect()->back()->with('message', 'Profile changed successfully.');
    }

    public function deleteclinicimage(Request $request , $id)
    {
        Clinicimage::where('id','=',$id)->update(array('status' => '0'));
        return redirect()->back()->with('message', 'Clinic Image Deleted successfully.');
    }

    public function socialmedia()
    {
        $userinfo = Doctor::with('socialmedias')->where('id','=',session('drid'))->first();
        // dd($userinfo->socialmedias);
        return view('doctor.socialmedia',compact('userinfo'));
    }

    public function socialmediapost(Request $request)
    {
        $request->validate(
            [
                'fb' => 'max:50',
                'twitter' => 'max:50',
                'insta' => 'max:50',
                'pinterest' => 'max:50',
                'linkedin' => 'max:50',
                'yt' => 'max:50',
            ]);

        if(Socialmedia::where('dr_id','=',session('drid'))->count() > 0)
        {
            Socialmedia::where('dr_id',session('drid'))
            ->update(array('fb'=>$request->fb , 'twitter'=>$request->twitter, 'insta'=>$request->insta,
             'pinterest'=>$request->pinterest, 'linkedin'=>$request->linkedin, 'yt'=>$request->yt));
        }
        else
        {
            $data = $request->all();
            $socialmedia = new Socialmedia($data);
            $socialmedia->dr_id = session('drid');
            $socialmedia->save();
        }
        return redirect()->back()->with('message', 'Socialmedias changed successfully.');
    }

    public function changepassword()
    {
        return view('doctor.changepassword');
    }

    public function changepasswordpost(Request $request)
    {
        $request->validate(
            [
                'oldpassword' => 'required|min:8',
                'newpassword' => 'required|min:8',
                'confirmpassword' => 'required|min:8|same:newpassword',
            ]);
        // dd($request->all());
        if(\Auth::attempt(['id' => session('userid') , 'password' => $request->oldpassword], $request->get('remember')))
        {
            $password = bcrypt($request['newpassword']);
            User::where('id',session('userid'))->update(array('password'=>$password));
            Doctor::where('userid',session('userid'))->update(array('password'=>$password));
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

    public function doctorschedules()
    {
        $userinfo = Doctor::with('sunday')->with('monday')->with('tuesday')
        ->with('wednesday')->with('thursday')->with('friday')->with('saturday')
        ->where('id','=',session('drid'))->first();
        // dd($userinfo->sunday);
        return view('doctor.timeschedules',compact('userinfo'));
    }
    
    //sunday
    public function doctorschedulesaddsunday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "0";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorscheduleseditsunday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        Doctorschedule::where('dr_id',session('drid'))->where('dayid','0')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "0";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }
    public function doctorschedulesdelete(Request $request,$id)
    {
        Doctorschedule::where('id',$id)->delete();
        return redirect()->back();
    }

    //monday
    public function doctorschedulesaddmonday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "1";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorscheduleseditmonday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
            Doctorschedule::where('dr_id',session('drid'))->where('dayid','1')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "1";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }

    //tuesday
    public function doctorschedulesaddtuesday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "2";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorschedulesedittuesday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
            Doctorschedule::where('dr_id',session('drid'))->where('dayid','2')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "2";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }

    //wednesday
    public function doctorschedulesaddwednesday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "3";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorscheduleseditwednesday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        Doctorschedule::where('dr_id',session('drid'))->where('dayid','3')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "3";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }

    //thursday
    public function doctorschedulesaddthursday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "4";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorscheduleseditthursday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        Doctorschedule::where('dr_id',session('drid'))->where('dayid','4')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "4";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }

    //friday
    public function doctorschedulesaddfriday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "5";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorscheduleseditfriday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        Doctorschedule::where('dr_id',session('drid'))->where('dayid','5')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "5";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }

    //saturday
    public function doctorschedulesaddsaturday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "6";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Added Successfully.');
    }
    public function doctorscheduleseditsaturday(Request $request)
    {
        $request->validate(
            [
                'starttime.*' => 'required',
                'endtime.*' => 'required',
            ]);
        Doctorschedule::where('dr_id',session('drid'))->where('dayid','6')->delete();
        $time = $request->starttime;
        if($time > 0)
        {
            $count1 = count($time);
            for($i=0;$i<$count1;$i++){
                $time = new Doctorschedule;
                $time->dayid = "6";
                $time->starttime = $request->starttime[$i];
                $time->endtime = $request->endtime[$i];
                $time->dr_id = session('drid');
                $time->save();
            }
        }
        return redirect()->back()->with('message', 'Slot Edited Successfully.');
    }
}