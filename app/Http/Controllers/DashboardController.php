<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $role = Auth::user()->role;
            $user_name = Auth::user()->name;

            $allowedRoles = ['super_admin', 'admin', 'hr', 'content_manager', 'viewer'];

            if (in_array($role, $allowedRoles)) {
                $users = User::all();

                return view('admin.dashboard.dashboard', compact('user_name', 'users'));
            } else {
                return view('auth.login');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }



}
