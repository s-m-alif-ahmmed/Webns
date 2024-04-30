<?php

namespace App\Models\Admin\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactMessage extends Model
{
    use HasFactory;

    private static $contact_message, $contact_messages;

    public static function createContactMessage($request)
    {
        try {
            self::$contact_message = new ContactMessage();
            self::saveBasicInfo(self::$contact_message, $request);
            self::$contact_message->save();
            return self::$contact_message;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateContactMessage($request, $id)
    {
        try {
            self::$contact_message = ContactMessage::find($id);
            self::saveBasicInfo(self::$contact_message, $request);
            self::$contact_message->save();
            return self::$contact_message;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }


    public static function deleteContactMessage($id)
    {
        try {
            self::$contact_message = ContactMessage::find($id);
            self::$contact_message->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($contact_message, $request)
    {
        $contact_message->name              = $request->name;
        $contact_message->email             = $request->email;
        $contact_message->number            = $request->number;
        $contact_message->company_name      = $request->company_name;
        $contact_message->subject           = $request->subject;
        $contact_message->message           = $request->message;
        $contact_message->note              = $request->note;
    }

}
