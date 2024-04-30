<?php

namespace App\Models\Admin\User;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    private static $department, $departments;

    public static function createDepartment($request)
    {
        try{
            self::$department     = new Department();
            self::saveBasicInfo(self::$department, $request);
            self::$department->save();
            return self::$department;
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public static function updateDepartment($request, $id)
    {
        try{
            self::$department = Department::find($id);
            self::saveBasicInfo(self::$department, $request);
            self::$department->update();
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public static function deleteDepartment($id)
    {
        try{
            self::$department = Department::find($id);
            self::$department->delete();
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }

    public static function saveBasicInfo($department, $request)
    {
        self::$department->name = $request->name;
    }
    public function designations()
    {
        return $this->hasMany(Designation::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
