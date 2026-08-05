<?php

namespace App\Models\Admin\DemoRequest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DemoRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $demo_request, $demo_requests;

    public static function createDemoRequest($request)
    {
        try {
            self::$demo_request = new DemoRequest();
            self::saveBasicInfo(self::$demo_request, $request);
            self::$demo_request->save();
            return self::$demo_request;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateDemoRequest($request, $id)
    {
        try {
            self::$demo_request = DemoRequest::find($id);
            self::saveBasicInfo(self::$demo_request, $request);
            self::$demo_request->save();
            return self::$demo_request;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }


    public static function deleteDemoRequest($id)
    {
        try {
            self::$demo_request = DemoRequest::find($id);
            self::$demo_request->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($demo_request, $request)
    {
        $demo_request->full_name                = $request->full_name;
        $demo_request->company_name             = $request->company_name;
        $demo_request->designation              = $request->designation;
        $demo_request->email                    = $request->email;
        $demo_request->number                   = $request->number;
        $demo_request->choose_product           = $request->choose_product;
        $demo_request->date                     = $request->date;
        $demo_request->time                     = $request->time;
        $demo_request->comment                  = $request->comment;
        $demo_request->note                     = $request->note;
    }

}
