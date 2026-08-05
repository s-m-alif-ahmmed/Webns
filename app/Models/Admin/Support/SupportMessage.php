<?php

namespace App\Models\Admin\Support;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupportMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $support_message, $support_messages;

    public static function createSupportMessage($request)
    {
        try {
            self::$support_message = new SupportMessage();
            self::saveBasicInfo(self::$support_message, $request);
            self::$support_message->save();
            return self::$support_message;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateSupportMessage($request, $id)
    {
        try {
            self::$support_message = SupportMessage::find($id);
            self::saveBasicInfo(self::$support_message, $request);
            self::$support_message->save();
            return self::$support_message;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }


    public static function deleteSupportMessage($id)
    {
        try {
            self::$support_message = SupportMessage::find($id);
            self::$support_message->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($support_message, $request)
    {
        $support_message->full_name              = $request->full_name;
        $support_message->company_name           = $request->company_name;
        $support_message->designation            = $request->designation;
        $support_message->email                  = $request->email;
        $support_message->number                 = $request->number;
        $support_message->choose_product         = $request->choose_product;
        $support_message->message                = $request->message;
        $support_message->note                   = $request->note;
    }

}
