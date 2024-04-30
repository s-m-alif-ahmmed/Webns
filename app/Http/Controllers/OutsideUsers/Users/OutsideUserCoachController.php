<?php

namespace App\Http\Controllers\OutsideUsers\Users;

use App\Http\Controllers\Controller;
use App\Models\OutsideUsers\OutsideUser;
use App\Models\OutsideUsers\OutsideUserCoach;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Session;

class OutsideUserCoachController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outsideUserId = Session::get('outside_user_id');

        // Use the retrieved ID to fetch the corresponding user
        $outside_user = OutsideUser::find($outsideUserId);
        return view('outside_users.dashboard.coach.index',[
            'outside_user_coaches' => OutsideUserCoach::all(),
        ], compact('outside_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $outside_user_coach = OutsideUserCoach::createOutsideUserCoach($request);
            return back()->with('message', 'Coach registration done successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            return view('admin.users.outside_user.coach.detail',[
                'outside_user_coach' => OutsideUserCoach::find($decryptID),
            ]);
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function adminEdit(string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            return view('admin.users.outside_user.coach.edit',[
                'outside_user_coach' => OutsideUserCoach::find($decryptID),
            ]);
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(Request $request, string $id)
    {
        try {
            OutsideUserCoach::updateOutsideUserCoach($request, $id);
            return redirect('/admin/company/user')->with('message','Company Coach Info update successfully.');
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
            $decryptID = Crypt::decryptString($id);
            $outside_user = OutsideUser::first();
            return view('outside_users.dashboard.coach.edit',[
                'outside_user_coach' => OutsideUserCoach::find($decryptID),
            ], compact('outside_user'));
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
            OutsideUserCoach::updateOutsideUserCoach($request, $id);
            return redirect('/company/coach/create')->with('message','Coach Info update successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function status(Request $request, string $id)
    {
        try {
            $status = OutsideUserCoach::select('status')->where('id',$id)->first();
            if($status->status == 'Waiting')
            {
                $status = 'Approved';
            }
            elseif($status->status == 'Approved')
            {
                $status = 'Rejected';
            }
            elseif($status->status == 'Rejected')
            {
                $status = 'Waiting';
            }
            OutsideUserCoach::where('id',$id)->update(['status'=>$status]);
            return back()->with('message','Selected company coach status changed successfully.');
        }catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            OutsideUserCoach::deleteOutsideUserCoach($id);
            return redirect('/admin/company/user')->with('message', 'Company Coach delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
