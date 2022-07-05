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
use DataTables;

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

    public function patientstatus($id)
    {
        $dr = Patient::where('id','=',$id)->first();
        if($dr->status == "1")
        {
            Patient::where('id','=',$id)->update(array('status' => '0'));
        }
        else
        {
            Patient::where('id','=',$id)->update(array('status' => '1'));
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
        $r = Review::where('id','=',$id)->first();
        if($r->status == 1)
        {
            Review::where('id','=',$id)->update(array('status' => '0'));
        }
        else
        {
            Review::where('id','=',$id)->update(array('status' => '1'));
        }
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

    public function ajaxListDoctor(Request $request)
    {
        if ($request->ajax()) {
            $data = Doctor::with('appointments')->get();
            return Datatables::of($data)
                    // ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    //         return $btn;
                    // })
                    // ->rawColumns(['action'])
                    ->editColumn('created_at', function ($request) {
                        return $request->created_at->format('d M,Y h:i A');
                    })
                    ->addColumn('drfirstname', function($data){
                        $fn = '-';
                        if($data->firstname)
                        {
                            $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                                    src="'.asset('/storage').'/'.$data->profileimage.
                                    '" alt=""><a href="/doctor-a/profile/'.$data->id.'" target="_blank">&nbsp;
                                    Dr. '.$data->firstname.' '.$data->lastname.'</a>';
                        }
                        return $fn;
                    })
                    ->addColumn('amount',function($request){
                        return $request->appointments->sum('amountpaid');
                    })
                    ->addColumn('action',function($request){
                        if($request->status == 1)
                        {
                            $btn = '<a href="/admin/doctorstatus/'.$request->id.'" 
                                    class="edit btn btn-danger btn-sm">DISABLE</a>';
                        }
                        else
                        {
                            $btn = '<a href="/admin/doctorstatus/'.$request->id.'" 
                                    class="edit btn btn-primary btn-sm">Enable</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action','drfirstname'])
                    ->make(true);
        }
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.doctorlist',compact('notification'));
    }

    public function ajaxListpatient(Request $request)
    {
        if ($request->ajax()) {
            $data = patient::with('appointments','last_appointments')->get();
            return Datatables::of($data)
                    ->editColumn('age', function ($request) {
                        $age = \Carbon\Carbon::parse($request->dob)->diff(\Carbon\Carbon::now())->y;
                        return $age;
                    })
                    ->editColumn('pfirstname', function($data){
                        if($data->firstname != null && $data->lastname != null)
                        {
                            $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                                src="'.asset('/storage').'/'.$data->profileimage.
                                '" alt=""><a href="">&nbsp;
                                '.$data->firstname.' '.$data->lastname.'</a>';
                                return $fn;
                        }
                        else
                        {
                            return 'Not Defined';
                        }
                    })
                    ->addColumn('bookingdate',function($data){
                        $booking_date = '-';
                        if($data->last_appointments){
                            $booking_date = $data->last_appointments->bookingdate;
                        }
                        return date('d M,Y',strtotime($booking_date));
                    })
                    ->addColumn('amount',function($request){
                        return $request->appointments->sum('amountpaid');
                    })
                    ->addColumn('action',function($request){
                        if($request->status == 1)
                        {
                            $btn = '<a href="/admin/patientstatus/'.$request->id.'" 
                                    class="edit btn btn-danger btn-sm">DISABLE</a>';
                        }
                        else
                        {
                            $btn = '<a href="/admin/patientstatus/'.$request->id.'" 
                                    class="edit btn btn-primary btn-sm">Enable</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['pfirstname','action'])
                    ->make(true);
        }
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.patientlist',compact('notification'));
    }

    public function ajaxReviews(Request $request)
    {
        if ($request->ajax()) {
            $data = Review::with('doctors','patients')->get();
            return Datatables::of($data)
                    ->addColumn('patientfirstname', function($data){
                        $fn= '-';
                        if($data->patients)
                        {
                            $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                                src="'.asset('/storage').'/'.$data->patients->profileimage.
                                '" alt=""><a href="">&nbsp;
                                '.$data->patients->firstname.' '.$data->patients->lastname.'</a>';
                                return $fn;
                        }
                        return $fn;
                    })
                    ->addColumn('drfirstname', function($data){
                        $fn = '-';
                        if($data->doctors){
                            $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                                    src="'.asset('/storage').'/'.$data->doctors->profileimage.
                                    '" alt=""><a href="/doctor-a/profile/'.$data->doctors->id.'" target="_blank">&nbsp;
                                    Dr. '.$data->doctors->firstname.' '.$data->doctors->lastname.'</a>';
                        }
                        return $fn;
                    })
                    ->editColumn('star', function($data){
                        if($data->star == 1)
                        {
                            $return = '<i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star-o text-secondary"></i>
                                       <i class="fe fe-star-o text-secondary"></i>
                                       <i class="fe fe-star-o text-secondary"></i>
                                       <i class="fe fe-star-o text-secondary"></i>';
                        }
                        else if($data->star == 2)
                        {
                            $return = '<i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star-o text-secondary"></i>
                                       <i class="fe fe-star-o text-secondary"></i>
                                       <i class="fe fe-star-o text-secondary"></i>';
                        }
                        else if($data->star == 3)
                        {
                            $return = '<i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star-o text-secondary"></i>
                                       <i class="fe fe-star-o text-secondary"></i>';
                        }
                        else if($data->star == 4)
                        {
                            $return = '<i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star-o text-secondary"></i>';
                        }
                        else
                        {
                            $return = '<i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>
                                       <i class="fe fe-star text-warning"></i>';
                        }

                        return $return;
                    })
                    ->editColumn('created_at', function($data){
                        return date('d M,Y',strtotime($data->created_at));
                    })
                    ->addColumn('action', function($data){
                       if($data->status == 1)
                       {
                            $btn = '<a href="/admin/deletereview/'.$data->id.'" 
                                    class="edit btn btn-danger btn-sm">DELETE</a>';
                       }
                       else
                       {
                            $btn = '<a href="/admin/deletereview/'.$data->id.'" 
                                    class="edit btn btn-primary btn-sm">UNDELETE</a>';
                       }
                       return $btn;
                    })
                    ->rawColumns(['patientfirstname','drfirstname','star','action'])
                    ->make(true);
        }
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.reviews',compact('notification'));
    }

    public function ajaxTransections(Request $request)
    {
        if($request->ajax()) {
            $data = Appointment::with('doctors','patients')->get();
            return Datatables::of($data)
                ->editColumn('id', function($data){
                    return '<a href="/admin/invoice/'.$data->id.'" target="_blank">IN-'.$data->id.'</a>';
                })
                ->addColumn('patientid', function($data){
                    return $data->patients->id;
                })
                ->addColumn('patientfirstname', function($data){
                    $fn= '-';
                    if($data->patients)
                    {
                        $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                            src="'.asset('/storage').'/'.$data->patients->profileimage.
                            '" alt=""><a href="">&nbsp;
                            '.$data->patients->firstname.' '.$data->patients->lastname.'</a>';
                            return $fn;
                    }
                    return $fn;
                })
                ->editColumn('created_at', function($data){
                    return date('d M,Y',strtotime($data->created_at));
                })
                ->rawColumns(['id','patientfirstname'])
                ->make(true);
        }
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.transectionlist',compact('notification'));
    }

    public function ajaxAppointments(Request $request)
    {
        if($request->ajax()) {
            $data = Appointment::with('doctors','patients')->get();
            return Datatables::of($data)
            ->addColumn('drfirstname', function($data){
                $fn = '-';
                if($data->doctors){
                    $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                            src="'.asset('/storage').'/'.$data->doctors->profileimage.
                            '" alt=""><a href="/doctor-a/profile/'.$data->doctors->id.'" target="_blank">&nbsp;
                            Dr. '.$data->doctors->firstname.' '.$data->doctors->lastname.'</a>';
                }
                return $fn;
            })
            ->addColumn('patientfirstname', function($data){
                $fn= '-';
                if($data->patients)
                {
                    $fn = '<img class="avatar-img rounded-circle" style="object-fit: cover; width:40px;height:40px" 
                        src="'.asset('/storage').'/'.$data->patients->profileimage.
                        '" alt=""><a href="">&nbsp;
                        '.$data->patients->firstname.' '.$data->patients->lastname.'</a>';
                        return $fn;
                }
                return $fn;
            })
            ->editColumn('bookingtime', function($data){
                return date('d M,Y',strtotime($data->bookingdate)).'-'.
                       date('h:i A',strtotime($data->bookingtime));
            })
            ->editColumn('status', function($data){
                if($data->status == 2)
                {
                    return '<label class="btn btn-warning btn-sm">Pending</label>';
                }
                else if($data->status == 1)
                {
                    return '<label class="btn btn-success btn-sm">Confirmed</label>';
                }
                else
                {
                    return '<label class="btn btn-danger btn-sm">Cancled</label>';
                }
            })
            ->editColumn('amountpaid', function($data){
                return '₹ '.$data->amountpaid;
            })
            ->rawColumns(['drfirstname','patientfirstname','status'])
            ->make(true);
        }
        $notification = Notification::with('doctors')->with('patients')->orderby('id','DESC')->get();
        return view('admin.appointmentlist',compact('notification'));
    }
}