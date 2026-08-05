<?php

namespace App\Models\Admin\User;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $designation, $designations;

    public static function createDesignation($request)
    {
        try{
            self::$designation     = new Designation();
            self::saveBasicInfo(self::$designation, $request);
            self::$designation->save();
            return self::$designation;
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public static function updateDesignation($request, $id)
    {
        try {
            self::$designation = Designation::find($id);
            self::saveBasicInfo(self::$designation, $request);
            self::$designation->save();
            return self::$designation;
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteDesignation($id)
    {
        try{
            self::$designation = Designation::find($id);
            self::$designation->delete();
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public static function saveBasicInfo($designation, $request)
    {
        self::$designation->department_id   = $request->department_id;
        self::$designation->name            = $request->name;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
