<?php

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Admin\Support\SupportMessage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SupportMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.support.support-message.index',[
                'support_messages' => SupportMessage::all(),
            ]);
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
            SupportMessage::createSupportMessage($request);
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
            return view('admin.support.support-message.details',[
                'support_message' => SupportMessage::find($decryptID),
            ]);
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
            SupportMessage::updateSupportMessage($request, $id);
            return back()->with('message','Support message note update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeSupportStatus($id)
    {
        try {
            $support_message = SupportMessage::select('status')->where('id',$id)->first();
            if($support_message->status == 'Read')
            {
                $status = 'UnRead';
            }
            elseif($support_message->status == 'UnRead')
            {
                $status = 'Read';
            }
            SupportMessage::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected support message status changed successfully.');
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
            SupportMessage::deleteSupportMessage($id);
            return redirect('/admin/support')->with('message', 'Support Message delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
