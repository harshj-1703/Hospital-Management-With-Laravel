<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Doctorschedule;
use App\Models\Clinicimage;
use App\Models\Clinic;
use App\Models\Favourite;
use App\Models\Review;
use App\Models\Blog;

class HomeController extends Controller
{
    public function doctorprofiles()
    {
        $doctor = Doctor::with('reviews')->with('sunday')->with('monday')->with('tuesday')
        ->with('wednesday')->with('thursday')->with('friday')->with('saturday')
        ->where('status','=','1')->get();
        return view('index',compact('doctor'));
    }
    public function godoctorprofile($id)
    {   
        $doctor = Doctor::with('clinics')->with('educations')->with('experiences')->with('awards')
        ->with('memberships')->with('registrations')->with('socialmedias')->with('reviews')
        ->where('status','=','1')->where('id','=',$id)->first();
        $clinic = Clinic::with('clinicimages')->where('dr_id','=',$id)->get();
        $review = Review::with('doctors')->with('patients')->where('dr_id','=',$id)->where('status','=','1')->
        orderby('id','DESC')->where('parent_id','=','0')->get();
        // $mainreply = Review::with('doctors')->with('patients')->where('dr_id','=',$id)->
        // orderby('id','DESC')->where('parent_id','=','0')->get();
        return view('doctor.profile',compact('doctor','clinic','review'));
    }
    public function favourite($id)
    {
        if($fav = Favourite::where('dr_id','=',$id)->where('patient_id','=',session('patientid'))->count() > 0)
        {
            $fav = Favourite::where('dr_id','=',$id)->first();
            if($fav->status == "0")
            {
                Favourite::where('dr_id','=',$id)->update(array('status' => '1'));
            }
            else
            {
                Favourite::where('dr_id','=',$id)->update(array('status' => '0'));
            }
        }
        else
        {
            
            $favr = new Favourite;
            $favr->dr_id = $id;
            $favr->patient_id = session('patientid');
            $favr->save();
        }
        return redirect()->back();
    }

    public function reviewpost(Request $request)
    {
        $request->validate(
            [
                'rating' => 'required',
                'title' => 'required|max:100|min:5',
                'detail' => 'required|max:200|min:10',
            ]
        );
        $rev = new Review;
        $rev->patient_id = session('patientid');
        $rev->dr_id = $request->hidden;
        if($request->rating == 'star-1'){
            $rev->star = "1";
        }else if($request->rating == 'star-2'){
            $rev->star = "2";
        }else if($request->rating == 'star-3'){
            $rev->star = "3";
        }else if($request->rating == 'star-4'){
            $rev->star = "4";
        }else{
            $rev->star = "5";
        }
        $rev->title = $request->title;
        $rev->detail = $request->detail;
        $rev->save();

        return redirect()->back();
    }

    public function recomendyes($id)
    {
        if(Review::where('id','=',$id)->where('recommended','=','2')->count() > 0)
        {
            Review::where('id','=',$id)->update(array('recommended' => '1'));
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }

    public function recomendno($id)
    {
        if(Review::where('id','=',$id)->where('recommended','=','2')->count() > 0)
        {
            Review::where('id','=',$id)->update(array('recommended' => '0'));
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }

    public function mainreply(Request $request)
    {
        $request->validate(
            [
                'mainreplyrating' => 'required',
                'mainreplytitle' => 'required|max:100|min:5',
                'mainreplydetail' => 'required|max:200|min:10',
                'mainreplycondition' => 'required',
            ]
        );
        $mention = Review::with('patients')->with('doctors')->
        where('id','=',$request->mainreplyhiddenparent)->first();
        $rev = new Review;
        $rev->patient_id = session('patientid');
        $rev->dr_id = $request->mainreplyhiddendrid;
        $rev->parent_id = $request->mainreplyhiddenparent;
        if($request->mainreplyrating == 'star1'){
            $rev->star = "1";
        }else if($request->mainreplyrating == 'star2'){
            $rev->star = "2";
        }else if($request->mainreplyrating == 'star3'){
            $rev->star = "3";
        }else if($request->mainreplyrating == 'star4'){
            $rev->star = "4";
        }else{
            $rev->star = "5";
        }
        $rev->title = "@".$mention->patients->firstname." ".$mention->patients->lastname." , ".$request->mainreplytitle;
        $rev->detail = $request->mainreplydetail;
        $rev->save();

        return redirect()->back();
    }
	public function godoctorprofile1($id)
    {   
        $doctor = Doctor::with('clinics')->with('educations')->with('experiences')->with('awards')
        ->with('memberships')->with('registrations')->with('socialmedias')->with('reviews')
        ->where('id','=',$id)->first();
        $clinic = Clinic::with('clinicimages')->where('dr_id','=',$id)->get();
        $review = Review::with('doctors')->with('patients')->where('dr_id','=',$id)->where('status','=','1')->
        orderby('id','DESC')->where('parent_id','=','0')->get();
        // $mainreply = Review::with('doctors')->with('patients')->where('dr_id','=',$id)->
        // orderby('id','DESC')->where('parent_id','=','0')->get();
        return view('doctor.profile',compact('doctor','clinic','review'));
    }

    public function goToBlog()
    {
        $blogs = Blog::with('doctors')->with('admins')->where('status','=','1')->get();
        $rblog = Blog::with('doctors')->with('admins')->orderBy('id','DESC')->where('status','=','1')->paginate(4);
        return view('blogs',compact('blogs','rblog'));
    }
    public function goToBlogPost(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:50|min:6',
                'detail' => 'required|max:2000|min:6',
            ]
        );
        
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->detail = $request->detail;
        if($request->drid != null)
        {
            $blog->dr_id = $request->drid;
        }
        if($request->adminid != null)
        {
            $blog->admin_id = $request->adminid;
        }
        $blog->save();

        return redirect()->back();
    }

    public function goToBlogFull($id)
    {
        $blog = Blog::where('status','=','1')->where('id','=',$id)->first();
        return view('blogfull',compact('blog'));
    }

    public function deleteBlog($id)
    {
        if(Blog::where('id','=',$id)->count() > 0)
        {
            Blog::where('id','=',$id)->update(array(
                'status' => '0'
            ));
        }
        return redirect('blogs');
    }

    public function updateBlog($id)
    {
        if(Blog::where('id','=',$id)->count() > 0)
        {
            $blog = Blog::with('doctors')->with('admins')->where('id','=',$id)->first();
            if(session('drid') != null)
            {
                if(session('drid') == $blog->dr_id)
                {
                    return view('blogedit',compact('blog'));
                }
                else
                {
                    return redirect('blogs');
                }
            }else if(session('adminid') != null)
            {
                if(session('adminid') == $blog->admin_id)
                {
                    return view('blogedit',compact('blog'));
                }
            }
            else
            {
                return redirect('blogs');
            }
        }
        else
        {
            return redirect('blogs');
        }
    }

    public function updateBlogPost(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|max:50|min:6',
                'detail' => 'required|max:2000|min:6',
            ]
        );

        Blog::where('id','=',$id)->update(array(
            'title' => $request->title,
            'detail' => $request->detail,
        ));

        return redirect('blogs');
    }
}
