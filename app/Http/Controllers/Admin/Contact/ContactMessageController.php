<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact\ContactMessage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.contact.contact-message.index',[
                'contact_messages' => ContactMessage::all(),
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
            ContactMessage::createContactMessage($request);
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
            return view('admin.contact.contact-message.details',[
                'contact_message' => ContactMessage::find($decryptID),
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
            ContactMessage::updateContactMessage($request, $id);
            return back()->with('message','Contact message note update successfully.');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeContactMessageStatus($id)
    {
        try {
            $contact_message = ContactMessage::select('status')->where('id',$id)->first();
            if($contact_message->status == 'Read')
            {
                $status = 'UnRead';
            }
            elseif($contact_message->status == 'UnRead')
            {
                $status = 'Read';
            }
            ContactMessage::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected Contact Message status changed successfully.');
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
            ContactMessage::deleteContactMessage($id);
            return redirect('/admin/contact-message')->with('message', 'Contact Message delete successfully');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
