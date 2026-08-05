<?php

namespace App\Models\OutsideUsers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OutsideUserCoach extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $outside_user_coach, $outside_user_coachs, $image, $employIdImage, $imageDirectory, $employIdImageDirectory, $imageName, $employIdImageName, $imageUrl, $employIdImageUrl;

    public static function uploadImage($request)
    {
        try {
            self::$image = $request->file('image');
            self::$imageName = rand(10000, 20000).self::$image->getClientOriginalName();
            self::$imageDirectory = "outside_user/images/coach_image/";
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
            return self::$imageDirectory.self::$imageName;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function uploadEmployIdImage($request)
    {
        try {
            self::$employIdImage = $request->file('employ_id_image');
            self::$employIdImageName = rand(10000, 20000).self::$employIdImage->getClientOriginalName();
            self::$employIdImageDirectory = "outside_user/images/coach_employ_id_photo/";
            self::$employIdImage->move(self::$employIdImageDirectory, self::$employIdImageName);
            self::$employIdImageUrl = self::$employIdImageDirectory.self::$employIdImageName;
            return self::$employIdImageDirectory.self::$employIdImageName;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function createOutsideUserCoach($request)
    {
        try {
            self::$imageUrl = self::uploadImage($request);
            self::$employIdImageUrl = self::uploadEmployIdImage($request);
            self::$outside_user_coach = new OutsideUserCoach();
            self::saveBasicInfo(self::$outside_user_coach, $request, self::$imageUrl, self::$employIdImageUrl);
            self::$outside_user_coach->save();
            return self::$outside_user_coach;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateOutsideUserCoach($request, $id)
    {
        try {
            self::$outside_user_coach = OutsideUserCoach::find($id);
            if($request->file('image'))
            {
                if(file_exists(self::$outside_user_coach->image)){
                    unlink(self::$outside_user_coach->image);
                }
                self::$imageUrl = self::uploadImage($request);
            }
            else{
                self::$imageUrl = self::$outside_user_coach->image;
            }
            if($request->file('employ_id_image'))
            {
                if(file_exists(self::$outside_user_coach->employ_id_image)){
                    unlink(self::$outside_user_coach->employ_id_image);
                }
                self::$employIdImageUrl = self::uploadEmployIdImage($request);
            }
            else{
                self::$employIdImageUrl = self::$outside_user_coach->employ_id_image;
            }
            self::saveBasicInfo(self::$outside_user_coach, $request, self::$imageUrl, self::$employIdImageUrl);
            self::$outside_user_coach->save();
            return self::$outside_user_coach;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteOutsideUserCoach($id)
    {
        try {
            self::$outside_user_coach = OutsideUserCoach::find($id);
            if (file_exists(self::$outside_user_coach->image))
            {
                unlink(self::$outside_user_coach->image);
            }
            if (file_exists(self::$outside_user_coach->employ_id_image))
            {
                unlink(self::$outside_user_coach->employ_id_image);
            }
            self::$outside_user_coach->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($outside_user_coach, $request, $imageUrl, $employIdImageUrl)
    {
        $outside_user_coach->outside_user_id           = $request->outside_user_id;
        $outside_user_coach->image                     = $imageUrl;
        $outside_user_coach->employ_id_image           = $employIdImageUrl;
        $outside_user_coach->name                      = $request->name;
        $outside_user_coach->email                     = $request->email;
        $outside_user_coach->number                    = $request->number;
        $outside_user_coach->designation               = $request->designation;
        $outside_user_coach->employ_id                 = $request->employ_id;
    }

    public function outside_user()
    {
        return $this->belongsTo(OutsideUser::class, 'outside_user_id');
    }

}
