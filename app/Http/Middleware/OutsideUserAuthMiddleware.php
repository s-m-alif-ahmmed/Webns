<?php

namespace App\Http\Middleware;

use App\Models\OutsideUsers\OutsideUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class OutsideUserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Session::has('outside_user_id')) {
            $userId = Session::get('outside_user_id');
            $user = OutsideUser::find($userId); // Replace 'User' with your actual User model

            if ($user && $user->ban_status == 0) {
                if ($user && $user->approve_status == 'Approved') {
                    return $next($request);
                } else {
                    return redirect()->route('outsider.login')->with('message', 'Please contact organizer.');
                }
            }else {
                return redirect()->route('outsider.login')->with('message', 'Account Restricted.');
            }
        }

        // Redirect to the login page if the user is not authenticated
        return redirect()->route('outsider.login')->with('message', 'Please log in to access the dashboard.');

    }
}
