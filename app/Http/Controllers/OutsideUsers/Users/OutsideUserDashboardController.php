<?php

namespace App\Http\Controllers\OutsideUsers\Users;

use App\Http\Controllers\Controller;
use App\Models\OutsideUsers\OutsideUser;
use Illuminate\Http\Request;
use Session;

class OutsideUserDashboardController extends Controller
{
    public function dashboard($id)
    {
        $outside_user_id = Session::get('outside_user_id');

        // Check if the authenticated user is accessing their own dashboard
        if ($outside_user_id == $id) {
            $outside_user = OutsideUser::find($id);

            if ($outside_user) {
                return view('outside_users.dashboard.dashboard.dashboard', [
                    'outside_user' => $outside_user,
                ],compact('outside_user'));
            } else {
                // Handle case where user is not found
                return redirect()->route('outsider.login')->with('message', 'User not found.');
            }
        } else {
            // Redirect to the login page if the user is not accessing their own dashboard
            return redirect()->route('outsider.login')->with('message', 'Unauthorized access.');
        }

    }

}
