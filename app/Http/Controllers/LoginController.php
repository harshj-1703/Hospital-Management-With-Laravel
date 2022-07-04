<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //Login function
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email|exists:users',
                'password' => 'required|min:8',
            ]
        );
        
        if (Auth::attempt($credentials)) 
        {
            $user = Auth::user();

            if($user->status == '1')
            {
                $a = Admin::where('userid','=',$user->id)->first();
                $request->session()->put('userid',$user->id);
                $request->session()->put('adminid',$a->id);
                $request->session()->put('adminprofile',$a->profileimage);
                $request->session()->put('adminname',$a->firstname." ".$a->lastname);
                return redirect('admindashboard');
            }

            else if($user->status == '2')
            {
                if(Doctor::where('userid','=',$user->id)->where('status','=','1')->count() > 0)
                {
                    $did = Doctor::where('userid','=',$user->id)->first();
                    $request->session()->put('userid',$user->id);
                    $request->session()->put('drid',$did->id);
                    $request->session()->put('drprofileimage',$did->profileimage);
                    $request->session()->put('drname',$did->firstname." ".$did->lastname);
                    $request->session()->put('drspecialist',strtoupper($did->specialization)." SPECIALIST");
                    // dd(session('drid'));
                    return redirect('/doctor/dashboard');
                }
                else
                {
                    return redirect()->back()->withInput($request->only('email'))->withErrors([
                        'email' => 'Take permission from admin for login as doctor',
                    ]);
                }
            }

            else
            {
                if(Patient::where('userid','=',$user->id)->where('status','=','1')->count() > 0)
                {
                    $did = Patient::where('userid','=',$user->id)->first();
                    $request->session()->put('userid',$user->id);
                    $request->session()->put('patientid',$did->id);
                    $request->session()->put('profileimage',$did->profileimage);
                    $request->session()->put('patientname',$did->firstname." ".$did->lastname);
                    $request->session()->put('patientdob',$did->dob);
                    if($did->city != null)
                    {
                        $request->session()->put('patientlocation',$did->city.",".$did->state.",".$did->country);
                    }
                    // dd(session()->all());
                    return redirect('/patient/dashboard');
                }
                else
                {
                    return redirect()->back()->withInput($request->only('email'))->withErrors([
                        'email' => 'you have removed! Take permission from admin for login as patient',
                    ]);
                }
            }
        }
        else
        {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'Wrong password',
            ]);
        }

    }
    
    //Logout function
    public function logout()
    {
        session()->flush();
        return redirect('login');
    }

    //Forgot password post
    public function forgotpassword(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
            ]
        );

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999). mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        $userinfo = User::where('email','=',$request->email)->first();  //get line
        $request->session()->put('forgotemail',$userinfo->email);
        $request->session()->put('forgotpassword',$string);
        $request->session()->put('forgotfname',$userinfo->fname);
        return redirect('sendhtmlemail');
    }

    //Send basic mail
    public function basic_email() {
        $data = array('name'=>"HJ KING");
        Mail::send(['text'=>'layout.forgotpasswordmodel'], $data, function($message) {
           $message->to(session('forgotemail'), 'HII, '.session('forgotfname'))->subject('ForgotPassword');
           $message->from('phptest1703@gmail.com','HJ KING');
        });
        return redirect()->back()->withErrors([
            'email' => 'MAIL SENT SUCCESSFULLY.',
        ]);
    }

    //Send html mail
    public function html_email() {
        $data = array('name'=>"HJ KING");
        Mail::send('layout.forgotpasswordmodel', $data, function($message) {
            $message->to(session('forgotemail'), 'HII, '.session('forgotfname'))->subject('ForgotPassword');
                $message->from('xyz@gmail.com','HJ KING');
        });
        return redirect()->back()->withErrors([
            'email' => 'MAIL SENT SUCCESSFULLY.',
        ]);
    }

    //Send attachment file in mail
    public function attachment_email() {
        $data = array('name'=>"HJ KING");
        Mail::send('mail', $data, function($message) {
           $message->to(session('forgotemail'), 'HII, '.session('forgotfname'))->subject('HJ');
           $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
           $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('xyz@gmail.com','HJ KING');
        });
        return redirect()->back()->withErrors([
            'email' => 'MAIL SENT SUCCESSFULLY.',
        ]);
    }
}