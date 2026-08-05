<?php

namespace App\Models\OutsideUsers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;

class OutsideUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $outside_user, $outside_users, $logo, $image, $employIdImage, $logoDirectory, $imageDirectory, $employIdImageDirectory, $logoName, $imageName, $employIdImageName, $logoUrl, $imageUrl, $employIdImageUrl;

    public static function uploadLogo($request)
    {
        try {
            self::$logo = $request->file('company_logo');
            self::$logoName = rand(10000, 20000).self::$logo->getClientOriginalName();
            self::$logoDirectory = "outside_user/images/company_logo/";
            self::$logo->move(self::$logoDirectory, self::$logoName);
            self::$logoUrl = self::$logoDirectory.self::$logoName;
            return self::$logoDirectory.self::$logoName;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function uploadImage($request)
    {
        try {
            if ($request->hasFile('manager_photo')){
                self::$image = $request->file('manager_photo');
                self::$imageName = rand(10000, 20000).self::$image->getClientOriginalName();
                self::$imageDirectory = "outside_user/images/team-manager_image/";
                self::$image->move(self::$imageDirectory, self::$imageName);
                self::$imageUrl = self::$imageDirectory.self::$imageName;
                return self::$imageDirectory.self::$imageName;
            }
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function uploadEmployIdImage($request)
    {
        try {
            self::$employIdImage = $request->file('manager_employ_id_image');
            self::$employIdImageName = rand(10000, 20000).self::$employIdImage->getClientOriginalName();
            self::$employIdImageDirectory = "outside_user/images/manager_employ_id_photo/";
            self::$employIdImage->move(self::$employIdImageDirectory, self::$employIdImageName);
            self::$employIdImageUrl = self::$employIdImageDirectory.self::$employIdImageName;
            return self::$employIdImageDirectory.self::$employIdImageName;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function createOutsideUser($request)
    {
        try {
            self::$logoUrl = self::uploadLogo($request);
            if ($request->hasFile('manager_photo')) {
            self::$imageUrl = self::uploadImage($request);
            }
            self::$employIdImageUrl = self::uploadEmployIdImage($request);
            self::$outside_user = new OutsideUser();
//            self::$outside_user->password = bcrypt($request->password);
            self::saveBasicInfo(self::$outside_user, $request, self::$logoUrl, self::$imageUrl, self::$employIdImageUrl);
            self::$outside_user->save();
            return self::$outside_user;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateOutsideUser($request, $id)
    {
        try {
            // Find the outside user by ID
            self::$outside_user = OutsideUser::find($id);

            if($request->file('company_logo'))
            {
                if(file_exists(self::$outside_user->company_logo)){
                    unlink(self::$outside_user->company_logo);
                }
                self::$logoUrl = self::uploadLogo($request);
            }
            else{
                self::$logoUrl = self::$outside_user->company_logo;
            }

            // Check and update manager photo
            if ($request->file('manager_photo')) {
                if (file_exists(self::$outside_user->manager_photo)) {
                    unlink(self::$outside_user->manager_photo);
                }
                self::$imageUrl = self::uploadImage($request);
            } else {
                self::$imageUrl = self::$outside_user->manager_photo;
            }

            // Check and update manager employ ID image
            if ($request->file('manager_employ_id_image')) {
                if (file_exists(self::$outside_user->manager_employ_id_image)) {
                    unlink(self::$outside_user->manager_employ_id_image);
                }
                self::$employIdImageUrl = self::uploadEmployIdImage($request);
            } else {
                self::$employIdImageUrl = self::$outside_user->manager_employ_id_image;
            }

            // Save basic info
            self::saveBasicInfo(self::$outside_user, $request, self::$logoUrl, self::$imageUrl, self::$employIdImageUrl);
            self::$outside_user->save();
            return self::$outside_user;
        } catch (ModelNotFoundException $e) {
            // Handle other exceptions
            return view('admin.error.error');
        }
    }


    public static function deleteOutsideUser($id)
    {
        try {
            self::$outside_user = OutsideUser::find($id);
            if (file_exists(self::$outside_user->company_logo))
            {
                unlink(self::$outside_user->company_logo);
            }
            if (file_exists(self::$outside_user->manager_photo))
            {
                unlink(self::$outside_user->manager_photo);
            }
            if (file_exists(self::$outside_user->manager_employ_id_image))
            {
                unlink(self::$outside_user->manager_employ_id_image);
            }
            self::$outside_user->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($outside_user, $request, $logoUrl, $imageUrl, $employIdImageUrl)
    {
        $outside_user->company_name                  = $request->company_name;
        $outside_user->company_logo                  = $logoUrl;
        $outside_user->manager_photo                 = $imageUrl;
        $outside_user->manager_employ_id_image       = $employIdImageUrl;
        $outside_user->company_email                 = $request->company_email;
        $outside_user->company_number                = $request->company_number;
        $outside_user->company_address               = $request->company_address;
        $outside_user->team_manager_name             = $request->team_manager_name;
        $outside_user->manager_designation           = $request->manager_designation;
        $outside_user->manager_email                 = $request->manager_email;
        $outside_user->manager_number                = $request->manager_number;
        $outside_user->manager_employ_id             = $request->manager_employ_id;
        if ($request->filled('password')) {
            $outside_user->password = bcrypt($request->password);
        }
//        $outside_user->password                      = $request->filled('password') ? bcrypt($request->password) : self::$outside_user->password;
        $outside_user->terms                         = $request->terms;
    }

    public function outside_user_players()
    {
        return $this->hasmany(OutsideUserPlayer::class);
    }

}
