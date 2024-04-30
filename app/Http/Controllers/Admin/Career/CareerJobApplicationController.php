<?php

namespace App\Http\Controllers\Admin\Career;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career\CareerDesignation;
use App\Models\Admin\Career\CareerJobApplication;
use App\Models\Admin\Career\CareerJobPost;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CareerJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_manage']) && $permissionData['career_all']['job_application_all']['job_application_manage'] == 'job_application_manage'){
                $career_job_applications = CareerJobApplication::all();
                $career_job_post = CareerJobPost::all();
                $career_designation = CareerDesignation::all();

                return view('admin.career.job-application.manage', [
                    'career_job_posts' => $career_job_post,
                    'career_designations' => $career_designation,
                    'career_job_applications' => $career_job_applications,
                ]);
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug_job_title)
    {
        try {
            $career_job_post = CareerJobPost::where('slug_job_title', $slug_job_title)->first();
            return view('webns.pages.career.application', [
                'career_job_post' => $career_job_post,
            ]);
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|unique:career_job_applications|max:255',
                'number' => 'required|unique:career_job_applications|max:14',
            ]);
            CareerJobApplication::createJobApplication($request);
            return back()->with('message','Job Application submit successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_detail']) && $permissionData['career_all']['job_application_all']['job_application_detail'] == 'job_application_detail'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.career.job-application.detail', [
                    'career_job_application' => CareerJobApplication::find($decryptID),
                ]);
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            CareerJobApplication::deleteJobApplication($id);
            return redirect('/admin/career/job/application')->with('message', 'Career Job Application delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeStatusJobApplicationChecked($id)
    {
        try {
            $checked = CareerJobApplication::select('checked')->where('id',$id)->first();
            if($checked->checked == 'on')
            {
                $checked = 'off';
            }
            elseif($checked->checked == 'off')
            {
                $checked = 'on';
            }
            CareerJobApplication::where('id',$id)->update(['checked' => $checked ]);
            return back()->with('message','Selected job application checked status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeStatusJobApplicationShortlisted($id)
    {
        try {
            $shortlisted = CareerJobApplication::select('shortlisted')->where('id',$id)->first();
            if($shortlisted->shortlisted == 'on')
            {
                $shortlisted = 'off';
            }
            elseif($shortlisted->shortlisted == 'off')
            {
                $shortlisted = 'on';
            }
            CareerJobApplication::where('id',$id)->update(['shortlisted' => $shortlisted ]);
            return back()->with('message','Selected job application shortlisted status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeStatusJobApplicationInterviewCall($id)
    {
        try {
            $interview_call = CareerJobApplication::select('interview_call')->where('id',$id)->first();
            if($interview_call->interview_call == 'on')
            {
                $interview_call = 'off';
            }
            elseif($interview_call->interview_call == 'off')
            {
                $interview_call = 'on';
            }
            CareerJobApplication::where('id',$id)->update(['interview_call' => $interview_call ]);
            return back()->with('message','Selected job application interview call status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeStatusJobApplicationRejected($id)
    {
        try {
            $rejected = CareerJobApplication::select('rejected')->where('id',$id)->first();
            if($rejected->rejected == 'on')
            {
                $rejected = 'off';
            }
            elseif($rejected->rejected == 'off')
            {
                $rejected = 'on';
            }
            CareerJobApplication::where('id',$id)->update(['rejected' => $rejected ]);
            return back()->with('message','Selected job application rejected status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeStatusJobApplicationHired($id)
    {
        try {
            $hired = CareerJobApplication::select('hired')->where('id',$id)->first();
            if($hired->hired == 'on')
            {
                $hired = 'off';
            }
            elseif($hired->hired == 'off')
            {
                $hired = 'on';
            }
            CareerJobApplication::where('id',$id)->update(['hired' => $hired ]);
            return back()->with('message','Selected job application hired status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

}
