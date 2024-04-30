<?php

namespace App\Http\Controllers\OutsideUsers\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Blog;
use App\Models\OutsideUsers\OutsideUser;
use App\Models\OutsideUsers\OutsideUserCoach;
use App\Models\OutsideUsers\OutsideUserPlayer;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;
use Session;


class OutsideUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('outside_users.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loginCheck(Request $request)
    {
        $this->outside_user = OutsideUser::where('manager_email', $request->manager_email)
            ->orWhere('company_email', $request->manager_email)
            ->first();

        if ($this->outside_user && password_verify($request->password, $this->outside_user->password)) {
            if ($this->outside_user->ban_status == 0) {
                Session::put('outside_user_id', $this->outside_user->id);
                Session::put('company_name', $this->outside_user->company_name);

                return redirect()->route('outsider.user.dashboard', [
                    'id' => $this->outside_user->id,
                ]);

            } else {
                return back()->with('message', 'Your account has been Restricted. Please contact administrator.');
            }
        } else {
            return back()->with('message', 'Invalid email address or password.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        Session::forget('outside_user_id');
        Session::forget('company_name');

        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('outside_users.auth.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'max:25',
                    'confirmed',
                    Rules\Password::defaults()],
            ]);
            $request->session()->regenerate();

            $outside_user = OutsideUser::createOutsideUser($request);
            return back()->with('message', 'Company registration done successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['users_all']['user_department']['department_edit']) && $permissionData['users_all']['user_department']['department_edit'] == 'department_edit'){
            $decryptID = Crypt::decryptString($id);
            return view('outside_users.dashboard.dashboard.edit',[
                'outside_user' => OutsideUser::find($decryptID),
            ]);
//            }else{
//                return view('admin.error.error');
//            }
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
            OutsideUser::updateOutsideUser($request, $id);
            return back()->with('message','Manager Info update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function index()
    {
        try {
            return view('admin.users.outside_user.manage',[
                'outside_users' => OutsideUser::all(),
            ]);
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $outside_user = OutsideUser::find($decryptID);
            $outside_user_players = OutsideUserPlayer::where('outside_user_id', $outside_user->id)->get();
            $outside_user_coaches = OutsideUserCoach::where('outside_user_id', $outside_user->id)->get();

            return view('admin.users.outside_user.detail',[
                'outside_user' => $outside_user,
                'outside_user_players' => $outside_user_players,
                'outside_user_coaches' => $outside_user_coaches,
            ]);
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function adminEdit(string $id)
    {
        try {
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['users_all']['user_department']['department_edit']) && $permissionData['users_all']['user_department']['department_edit'] == 'department_edit'){
                $decryptID = Crypt::decryptString($id);
                return view('admin.users.outside_user.edit',[
                    'outside_user' => OutsideUser::find($decryptID),
                ]);
//            }else{
//                return view('admin.error.error');
//            }
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(Request $request, string $id)
    {
        try {
            OutsideUser::updateOutsideUser($request, $id);
            return redirect('/admin/company/user')->with('message','Company Info update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try {
            OutsideUser::deleteOutsideUser($id);
            OutsideUserPlayer::deleteOutsideUserPlayer($id);
            OutsideUserCoach::deleteOutsideUserCoach($id);
            return redirect('/admin/company/user')->with('message', 'Company User delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function adminChangeBanStatus(string $id)
    {
        try {
            $banned = OutsideUser::select('ban_status')->where('id',$id)->first();
            if($banned->ban_status == 1)
            {
                $banStatus = 0;
            }
            elseif($banned->ban_status == 0)
            {
                $banStatus = 1;
            }
            OutsideUser::where('id',$id)->update(['ban_status'=>$banStatus]);
            return back()->with('message','Selected company user restriction status changed successfully.');
        }catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function adminChangeApproveStatus(string $id)
    {
        try {
            $approve = OutsideUser::select('approve_status')->where('id',$id)->first();
            if($approve->approve_status == 'Waiting')
            {
                $approveStatus = 'Approved';
            }
            elseif($approve->approve_status == 'Approved')
            {
                $approveStatus = 'Rejected';
            }
            elseif($approve->approve_status == 'Rejected')
            {
                $approveStatus = 'Waiting';
            }
            OutsideUser::where('id',$id)->update(['approve_status'=>$approveStatus]);
            return back()->with('message','Selected company user status changed successfully.');
        }catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }
}
