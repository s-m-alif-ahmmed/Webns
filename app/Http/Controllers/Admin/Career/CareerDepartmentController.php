<?php

namespace App\Http\Controllers\Admin\Career;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CareerDepartmentController extends Controller
{
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['career_department']['department_manage']) && $permissionData['career_all']['career_department']['department_manage'] == 'department_manage'){
                return view('admin.career.department.manage',[
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

    public function create()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['career_all']['career_department']['department_create']) && $permissionData['career_all']['career_department']['department_create'] == 'department_create'){
                return view('admin.career.department.create');
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
                'name' => ['required', 'max:50', 'unique:' . CareerDepartment::class],
            ]);
            CareerDepartment::createCareerDepartment($request);
            return back()->with('message','Career Department create successfully.');
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
            if($permissionData && isset($permissionData['career_all']['career_department']['department_detail']) && $permissionData['career_all']['career_department']['department_detail'] == 'department_detail'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.career.department.detail',[
                    'career_department' => CareerDepartment::find($decryptID),
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
            if($permissionData && isset($permissionData['career_all']['career_department']['department_edit']) && $permissionData['career_all']['career_department']['department_edit'] == 'department_edit'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.career.department.edit',[
                    'career_department' => CareerDepartment::find($decryptID),
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
            $request->validate([
                'name' => ['required', 'max:50', 'unique:' . CareerDepartment::class],
            ]);
            CareerDepartment::updateCareerDepartment($request, $id);
            return redirect('/admin/career-department')->with('message','Career Department update successfully.');
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
            CareerDepartment::deleteCareerDepartment($id);
            return redirect('/admin/career-department')->with('message', 'Career Department delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

}
