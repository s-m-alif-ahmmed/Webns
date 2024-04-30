<?php

namespace App\Http\Controllers\Admin\SubscribeEmail;

use App\Http\Controllers\Controller;
use App\Models\Admin\SubscribeEmail\SubscribeEmail;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class SubscribeEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.subscribe.index',[
                'subscribe_emails' => SubscribeEmail::all(),
            ]);
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:subscribe_emails,email',
            ], [
                'email.unique' => 'The email address is already subscribed.',
            ]);

            SubscribeEmail::createSubscribeEmail($request);
            return back()->with('message','Subscription successful.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            SubscribeEmail::deleteSubscribeEmail($id);
            return redirect('/admin/subscribe-email')->with('message', 'Subscription email delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
