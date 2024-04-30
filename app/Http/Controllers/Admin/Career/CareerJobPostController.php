<?php

namespace App\Http\Controllers\Admin\Career;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use App\Models\Admin\Career\CareerJobApplication;
use App\Models\Admin\Career\CareerJobPost;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CareerJobPostController extends Controller
{
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_manage']) && $permissionData['career_all']['job_post_all']['job_post_manage'] == 'job_post_manage'){
                return view('admin.career.job-post.manage',[
                    'career_departments' => CareerDepartment::all(),
                    'career_designations' => CareerDesignation::all(),
                    'career_job_posts' => CareerJobPost::all(),
                ]);
            }else{
                return view('admin.error.error');
            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public function create()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_create']) && $permissionData['career_all']['job_post_all']['job_post_create'] == 'job_post_create'){
                return view('admin.career.job-post.index',[
                    'career_departments' => CareerDepartment::all(),
                    'career_designations' => CareerDesignation::all(),
                ]);
            }else{
                return view('admin.error.error');
            }
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
            CareerJobPost::createJobPost($request);
            return back()->with('message','Career Job Post create successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_detail']) && $permissionData['career_all']['job_post_all']['job_post_detail'] == 'job_post_detail'){
            $decryptID = Crypt::decryptString($id);
            return view('admin.career.job-post.detail',[
                'career_job_post' => CareerJobPost::find($decryptID),
            ]);
            }else{
                return view('admin.error.error');
            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
    /**
     * Display Preview the specified resource.
     */
    public function jobPreview(string $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_preview']) && $permissionData['career_all']['job_post_all']['job_post_preview'] == 'job_post_preview'){
            $decryptID = Crypt::decryptString($id);
            return view('admin.career.job-post.preview',[
                'career_job_post' => CareerJobPost::find($decryptID),
                'career_departments' => CareerDepartment::all(),
                'career_designations' => CareerDesignation::all(),
            ]);
            }else{
                return view('admin.error.error');
            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_edit']) && $permissionData['career_all']['job_post_all']['job_post_edit'] == 'job_post_edit'){
            $decryptID = Crypt::decryptString($id);
            $career_job_post = CareerJobPost::with(['career_department', 'career_designation'])
                ->find($decryptID);
            return view('admin.career.job-post.edit',[
                'career_job_post' => $career_job_post,
                'career_departments' => CareerDepartment::all(),
                'career_designations' => CareerDesignation::all(),
            ]);
            }else{
                return view('admin.error.error');
            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            CareerJobPost::updateJobPost($request, $id);
            return redirect('/admin/career-job')->with('message','Career Job Post update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeJobPostStatus($id)
    {
        try {
            $jobPost = CareerJobPost::select('status')->where('id',$id)->first();
            if($jobPost->status == 'Publish')
            {
                $status = 'UnPublish';
            }
            elseif($jobPost->status == 'UnPublish')
            {
                $status = 'Publish';
            }
            elseif($jobPost->status == 'Draft')
            {
                $status = 'Publish';
            }
            CareerJobPost::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected Job Post status changed successfully.');
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
            CareerJobPost::deleteJobPost($id);
//            CareerJobApplication::deleteJobApplication($id);
            return redirect('/admin/career-job')->with('message', 'Career Job Post delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public function getCareerDesignationsByDepartment(Request $request)
    {
        $careerDepartmentId = $request->input('career_department_id');
        $careerDesignations = CareerDesignation::where('career_department_id', $careerDepartmentId)->get();

        return response()->json($careerDesignations);
    }
    public function getPrefixIdByDesignation(Request $request)
    {
        $careerDesignationId = $request->input('career_designation_id');
        $careerDesignation = CareerDesignation::find($careerDesignationId);

        return response()->json(['prefix_id' => $careerDesignation->prefix_id]);
    }

}
