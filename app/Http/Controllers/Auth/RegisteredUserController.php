<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\Department;
use App\Models\Admin\User\Designation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use function League\Flysystem\path;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        try {
//            return view('auth.register');
            return view('admin.error.error');
        }catch (DecryptException $e){
        return view('admin.error.error');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'officer_id' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'address' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'integer', 'max:255'],
            'designation_id' => ['required', 'integer', 'max:255'],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:25',
                'confirmed',
                Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'officer_id' => $request->officer_id,
            'number' => $request->number,
            'address' => $request->address,
            'role' => $request->role,
            'department_id' => $request->department_id,
            'designation_id' => $request->designation_id,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

//        Auth::login($user);

        return back()->with('message','User create successfully.');
    }
}
