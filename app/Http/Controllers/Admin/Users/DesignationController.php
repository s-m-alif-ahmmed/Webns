<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\Department;
use App\Models\Admin\User\Designation;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['users_all']['user_designation']['designation_manage']) && $permissionData['users_all']['user_designation']['designation_manage'] == 'designation_manage'){
                return view('admin.users.designation.manage',[
                'designations' => Designation::all(),
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
            if($permissionData && isset($permissionData['users_all']['user_designation']['designation_create']) && $permissionData['users_all']['user_designation']['designation_create'] == 'designation_create'){
                return view('admin.users.designation.create',[
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'max:50', 'unique:' . Designation::class],
                'department_id' => ['required'],
            ]);
            Designation::createDesignation($request);
            return back()->with('message','Designation create successfully.');
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
            if($permissionData && isset($permissionData['users_all']['user_designation']['designation_detail']) && $permissionData['users_all']['user_designation']['designation_detail'] == 'designation_detail'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.users.designation.detail',[
                    'designation' => Designation::find($decryptID),
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
    public function changeStatusDesignation($id)
    {
        try {
            $designation = Designation::select('status')->where('id',$id)->first();
            if($designation->status == 'active')
            {
                $status = 'inActive';
            }
            elseif($designation->status == 'inActive')
            {
                $status = 'active';
            }
            Designation::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected designation status changed successfully.');
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
            if($permissionData && isset($permissionData['users_all']['user_designation']['designation_edit']) && $permissionData['users_all']['user_designation']['designation_edit'] == 'designation_edit'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.users.designation.edit',[
                    'designation' => Designation::find($decryptID),
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $request->validate([
                'name' => ['required', 'max:50', Rule::unique('designations')->ignore($decryptID)],
                'department_id' => ['required'],
            ]);
            Designation::updateDesignation($request, $decryptID);
            return redirect('/designation')->with('message', 'Designation updated successfully.');
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
            Designation::deleteDesignation($id);
            return redirect('/designation')->with('message', 'Designation delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
