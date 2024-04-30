<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\Department;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['users_all']['user_department']['department_manage']) && $permissionData['users_all']['user_department']['department_manage'] == 'department_manage'){
                return view('admin.users.department.manage',[
                    'departments' => Department::all(),
                ]);
            }else{
                return view('admin.error.error');
            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['users_all']['user_department']['department_create']) && $permissionData['users_all']['user_department']['department_create'] == 'department_create'){
                return view('admin.users.department.create');
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
                'name' => ['required', 'max:50', 'unique:' . Department::class],
            ]);
            Department::createDepartment($request);
            return back()->with('message','Department create successfully.');
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
            if($permissionData && isset($permissionData['users_all']['user_department']['department_detail']) && $permissionData['users_all']['user_department']['department_detail'] == 'department_detail'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.users.department.detail',[
                    'department' => Department::find($decryptID),
                ]);
            }else{
            return view('admin.error.error');
            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Change status the specified resource.
     */
    public function changeStatusDepartment($id)
    {
        try {
            $department = Department::select('status')->where('id',$id)->first();
            if($department->status == 'active')
            {
                $status = 'inActive';
            }
            elseif($department->status == 'inActive')
            {
                $status = 'active';
            }
            Department::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected department status changed successfully.');
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
            if($permissionData && isset($permissionData['users_all']['user_department']['department_edit']) && $permissionData['users_all']['user_department']['department_edit'] == 'department_edit'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.users.department.edit',[
                    'department' => Department::find($decryptID),
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
                'name' => ['required', 'max:50', 'unique:' . Department::class],
            ]);
            Department::updateDepartment($request, $id);
            return redirect('/department')->with('message','Department update successfully.');
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
            Department::deleteDepartment($id);
            return redirect('/department')->with('message', 'Department delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
