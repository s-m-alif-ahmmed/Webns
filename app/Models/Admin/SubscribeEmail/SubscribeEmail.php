<?php

namespace App\Models\Admin\SubscribeEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubscribeEmail extends Model
{
    use HasFactory;


    private static $subscribe_email, $subscribe_emails;

    public static function createSubscribeEmail($request)
    {
        try {
            self::$subscribe_email = new SubscribeEmail();
            self::saveBasicInfo(self::$subscribe_email, $request);
            self::$subscribe_email->save();
            return self::$subscribe_email;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteSubscribeEmail($id)
    {
        try {
            self::$subscribe_email = SubscribeEmail::find($id);
            self::$subscribe_email->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($subscribe_email, $request)
    {
        $subscribe_email->email             = $request->email;
    }

}
