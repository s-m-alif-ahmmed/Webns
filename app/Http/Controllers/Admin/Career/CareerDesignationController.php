<?php

namespace App\Http\Controllers\Admin\Career;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CareerDesignationController extends Controller
{
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['career_designation']['designation_manage']) && $permissionData['career_all']['career_designation']['designation_manage'] == 'designation_manage'){
                return view('admin.career.designation.manage', [
                    'career_designations' => CareerDesignation::all(),
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
            if($permissionData && isset($permissionData['career_all']['career_designation']['designation_create']) && $permissionData['career_all']['career_designation']['designation_create'] == 'designation_create'){
                return view('admin.career.designation.create',[
                    'career_departments' => CareerDepartment::all(),
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
            $request->validate([
                'name' => ['required', 'max:50'],
                'prefix_id' => Rule::unique('career_designations', 'prefix_id'),
            ]);

            CareerDesignation::createCareerDesignation($request);
            return back()->with('message','Career Designation create successfully.');
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
            if($permissionData && isset($permissionData['career_all']['career_designation']['designation_detail']) && $permissionData['career_all']['career_designation']['designation_detail'] == 'designation_detail'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.career.designation.detail',[
                    'career_designation' => CareerDesignation::find($decryptID),
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
            if($permissionData && isset($permissionData['career_all']['career_designation']['designation_edit']) && $permissionData['career_all']['career_designation']['designation_edit'] == 'designation_edit'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.career.designation.edit', [
                    'career_departments' => CareerDepartment::all(),
                    'career_designation' => CareerDesignation::find($decryptID),
                ]);
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
//            $request->validate([
//                'name' => ['required', 'max:50', Rule::unique('career_designations')->ignore($id)],
//                'career_department_id' => ['required'],
//            ]);
            $decryptID = Crypt::decryptString($id);
            CareerDesignation::updateCareerDesignation($request, $decryptID);
            return redirect('/admin/career-designation')->with('message','Career Designation update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            CareerDesignation::deleteCareerDesignation($id);
            return redirect('/admin/career-designation')->with('message', 'Career Designation delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
