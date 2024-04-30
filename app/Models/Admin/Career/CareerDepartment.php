<?php

namespace App\Models\Admin\Career;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CareerDepartment extends Model
{
    use HasFactory;

    private static $career_department, $career_departments;

    public static function createCareerDepartment($request)
    {
        try{
            self::$career_department     = new CareerDepartment();
            self::saveBasicInfo(self::$career_department, $request);
            self::$career_department->save();
            return self::$career_department;
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }

    public static function updateCareerDepartment($request, $id)
    {
        try{
            self::$career_department = CareerDepartment::find($id);
            self::saveBasicInfo(self::$career_department, $request);
            self::$career_department->update();
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }
    
     public static function boot()
    {
        parent::boot();
        self::creating(function($career_department){
            $career_department->slug = Str::slug($career_department->name, '-');
        });
        self::updating(function($career_department){
            $career_department->slug = Str::slug($career_department->name, '-');
        });
    }

    public static function deleteCareerDepartment($id)
    {
        try {
            self::$career_department = CareerDepartment::find($id);

            // Delete related designations
            self::$career_department->career_designations()->delete();

            // Delete the department itself
            self::$career_department->delete();

        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function saveBasicInfo($career_department, $request)
    {
        self::$career_department->name = $request->name;
    }

    public function career_designations()
    {
        return $this->hasMany(CareerDesignation::class);
    }

}
