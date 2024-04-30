<?php

namespace App\Models\OutsideUsers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OutsideUserPlayer extends Model
{
    use HasFactory;

    private static $outside_user_player, $outside_user_players, $image, $employIdImage, $imageDirectory, $employIdImageDirectory, $imageName, $employIdImageName, $imageUrl, $employIdImageUrl;

    public static function uploadImage($request)
    {
        try {
                self::$image = $request->file('image');
                self::$imageName = rand(10000, 20000).self::$image->getClientOriginalName();
                self::$imageDirectory = "outside_user/images/player_image/";
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
            self::$employIdImageDirectory = "outside_user/images/player_employ_id_photo/";
            self::$employIdImage->move(self::$employIdImageDirectory, self::$employIdImageName);
            self::$employIdImageUrl = self::$employIdImageDirectory.self::$employIdImageName;
            return self::$employIdImageDirectory.self::$employIdImageName;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function createOutsideUserPlayer($request)
    {
        try {
            self::$imageUrl = self::uploadImage($request);
            self::$employIdImageUrl = self::uploadEmployIdImage($request);
            self::$outside_user_player = new OutsideUserPlayer();
            self::saveBasicInfo(self::$outside_user_player, $request, self::$imageUrl, self::$employIdImageUrl);
            self::$outside_user_player->save();
            return self::$outside_user_player;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateOutsideUserPlayer($request, $id)
    {
        try {
            self::$outside_user_player = OutsideUserPlayer::find($id);
            if($request->file('image'))
            {
                if(file_exists(self::$outside_user_player->image)){
                    unlink(self::$outside_user_player->image);
                }
                self::$imageUrl = self::uploadImage($request);
            }
            else{
                self::$imageUrl = self::$outside_user_player->image;
            }
            if($request->file('employ_id_image'))
            {
                if(file_exists(self::$outside_user_player->employ_id_image)){
                    unlink(self::$outside_user_player->employ_id_image);
                }
                self::$employIdImageUrl = self::uploadEmployIdImage($request);
            }
            else{
                self::$employIdImageUrl = self::$outside_user_player->employ_id_image;
            }
            self::saveBasicInfo(self::$outside_user_player, $request, self::$imageUrl, self::$employIdImageUrl);
            self::$outside_user_player->save();
            return self::$outside_user_player;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteOutsideUserPlayer($id)
    {
        try {
            self::$outside_user_player = OutsideUserPlayer::find($id);
            if (file_exists(self::$outside_user_player->image))
            {
                unlink(self::$outside_user_player->image);
            }
            if (file_exists(self::$outside_user_player->employ_id_image))
            {
                unlink(self::$outside_user_player->employ_id_image);
            }
            self::$outside_user_player->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($outside_user_player, $request, $imageUrl, $employIdImageUrl)
    {
        $outside_user_player->outside_user_id           = $request->outside_user_id;
        $outside_user_player->image                     = $imageUrl;
        $outside_user_player->employ_id_image           = $employIdImageUrl;
        $outside_user_player->name                      = $request->name;
        $outside_user_player->email                     = $request->email;
        $outside_user_player->number                    = $request->number;
        $outside_user_player->designation               = $request->designation;
        $outside_user_player->employ_id                 = $request->employ_id;
        $outside_user_player->player_type               = $request->player_type;

    }

//    public function outside_user()
//    {
//        return $this->belongsTo(OutsideUser::class, 'outside_user_id', 'id');
//    }

    public function outside_user()
    {
        return $this->belongsTo(OutsideUser::class, 'outside_user_id');
    }

}
