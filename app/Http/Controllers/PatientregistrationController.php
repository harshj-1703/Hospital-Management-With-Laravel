<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;

class PatientregistrationController extends Controller
{
    public function patientregistration(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:users|min:6',
                'phoneno' => 'required|unique:users|min:10|max:10',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirmpassword' => 'required|same:password|min:8',
            ]
        );

        // dd($request->all());

        $data = $request->all();
        $data['username'] = strtolower($request['username']);
        $data['password'] = bcrypt($request['password']);
        // dd($data);

        //with using fillable private attribute in model
        $user = new User($data);
        $user->status = '3';
        $user->save();

        $patient = new Patient($data);
        $patient->userid = $user->id;
        $patient->save();
        
        return redirect('login');
    }
}
