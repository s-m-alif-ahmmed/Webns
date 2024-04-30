<?php

namespace App\Http\Controllers\Admin\DemoRequest;

use App\Http\Controllers\Controller;
use App\Models\Admin\DemoRequest\DemoRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DemoRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.demo-request.demo-request-message.index',[
                'demo_requests' => DemoRequest::all(),
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
            DemoRequest::createDemoRequest($request);
            return back()->with('message','Your message sent successfully.');
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
            $decryptID = Crypt::decryptString($id);
            return view('admin.demo-request.demo-request-message.detail',[
                'demo_request' => DemoRequest::find($decryptID),
            ]);
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
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
        try {
            DemoRequest::updateDemoRequest($request, $id);
            return back()->with('message','Demo request message note update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeDemoRequestStatus($id)
    {
        try {
            $demo_request = DemoRequest::select('status')->where('id',$id)->first();
            if($demo_request->status == 'Read')
            {
                $status = 'UnRead';
            }
            elseif($demo_request->status == 'UnRead')
            {
                $status = 'Read';
            }
            DemoRequest::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected Demo Request message status changed successfully.');
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
            DemoRequest::deleteDemoRequest($id);
            return redirect('/admin/demo-request')->with('message', 'Demo Request Message delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
