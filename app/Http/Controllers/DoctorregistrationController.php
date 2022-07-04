<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

class DoctorregistrationController extends Controller
{
    public function doctorregistration(Request $request)
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
        $user->status = '2';
        $user->save();

        $doctor = new Doctor($data);
        $doctor->userid = $user->id;
        $doctor->save();
        
        return redirect('login');
    }
}
