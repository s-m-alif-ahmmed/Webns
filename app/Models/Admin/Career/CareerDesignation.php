<?php

namespace App\Models\Admin\Career;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CareerDesignation extends Model
{
    use HasFactory;

    private static $career_designation, $career_designations;

    public static function createCareerDesignation($request)
    {
        try{
            self::$career_designation     = new CareerDesignation();
            self::saveBasicInfo(self::$career_designation, $request);
            self::$career_designation->save();
            return self::$career_designation;
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }

    public static function updateCareerDesignation($request, $id)
    {
        try{
            self::$career_designation = CareerDesignation::find($id);
            self::saveBasicInfo(self::$career_designation, $request);
            self::$career_designation->save();
            return self::$career_designation;
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }

    public static function deleteCareerDesignation($id)
    {
        try{
            self::$career_designation = CareerDesignation::find($id);
            self::$career_designation->delete();
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }

    public static function saveBasicInfo($career_designation, $request)
    {
        self::$career_designation->career_department_id     = $request->career_department_id;
        self::$career_designation->name                     = $request->name;
    }

    public static function boot()
    {
        parent::boot();
        try{
            self::creating(function($career_designation){
                $career_department = $career_designation->career_department;

                if (is_object($career_department) && isset($career_department->name)) {
                    $department_prefix = Str::limit(Str::slug($career_department->name), 3, '');
                    $designation_prefix = Str::limit(Str::slug($career_designation->name), 3, '');

                    $prefix_id = Str::slug('WEBNS' . '-' . $department_prefix . '-' . $designation_prefix . '-' . date_format(now(), 'Y-M-d'));

                    $career_designation->prefix_id = $prefix_id;
                } else {
                    return view('admin.error.error');
                }
            });
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
        try{
            self::updating(function($career_designation){
                $career_department = $career_designation->career_department;

                if (is_object($career_department) && isset($career_department->name)) {
                    $department_prefix = Str::limit(Str::slug($career_department->name), 3, '');
                    $designation_prefix = Str::limit(Str::slug($career_designation->name), 3, '');

                    $prefix_id = Str::slug('WEBNS' . '-' . $department_prefix . '-' . $designation_prefix . '-' . date_format(now(), 'Y-M-d'));

                    $career_designation->prefix_id = $prefix_id;
                } else {
                    return view('admin.error.error');
                }
            });
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }

    public function career_department()
    {
        return $this->belongsTo(CareerDepartment::class);
    }

    public function career_departments()
    {
        return $this->hasMany(CareerDepartment::class);
    }


}
