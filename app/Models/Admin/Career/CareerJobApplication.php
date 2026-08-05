<?php

namespace App\Models\Admin\Career;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CareerJobApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $job_application, $job_applications, $resume, $directory, $resumeName, $resumeUrl;

    public static function uploadResume($request)
    {
        try {
            self::$resume = $request->file('resume');
            self::$resumeName = rand(10000, 20000).self::$resume->getClientOriginalName();
            self::$directory = "admin/pdf/career/";
            self::$resume->move(self::$directory, self::$resumeName);
            self::$resumeUrl = self::$directory.self::$resumeName;
            return self::$directory.self::$resumeName;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function createJobApplication($request)
    {
        try {
            self::$resumeName = self::uploadResume($request);
            self::$job_application = new CareerJobApplication();
            self::saveBasicInfo(self::$job_application, $request, self::$resumeUrl);
            self::$job_application->save();
            return self::$job_application;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteJobApplication($id)
    {
        try {
            self::$job_application = CareerJobApplication::find($id);
            $resumePath = self::$job_application->resume;

            if (file_exists($resumePath)) {
                unlink($resumePath);
            }

            self::$job_application->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($job_application, $request, $resumeUrl)
    {
        $job_application->career_job_post_id                = $request->career_job_post_id;
        $job_application->prefix_id                         = $request->prefix_id;
        $job_application->resume                            = $resumeUrl;
        $job_application->full_name                         = $request->full_name;
        $job_application->email                             = $request->email;
        $job_application->number                            = $request->number;
        $job_application->expected_salary                   = $request->expected_salary;
        $job_application->cover_letter                      = $request->cover_letter;
    }

    public static function boot()
    {
        parent::boot();
        try{
            self::creating(function($job_application){
                $job_application_prefix_id = Str::slug($job_application->prefix_id);
                $job_application_number = substr($job_application->number, -5);
                $job_application_name = $job_application->full_name;
                $job_application->slug_job_application = Str::slug( $job_application_prefix_id . '-' . date_format(now(), 'Y-M-d') . '-' . $job_application_name . '-' . $job_application_number);
            });
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
        try{
            self::updating(function($job_application){
                $job_application_prefix_id = Str::slug($job_application->prefix_id);
                $job_application_name = $job_application->full_name;
                $job_application->slug_job_application = Str::slug( $job_application_prefix_id . '-' . date_format(now(), 'Y-M-d') . '-' . $job_application_name . '-');
            });
        }catch (ModelNotFoundException $e){
            return view('admin.error.error');
        }
    }

    public function career_job_posts()
    {
        return $this->hasMany(CareerJobPost::class);
    }
    public function career_job_post()
    {
        return $this->belongsTo(CareerJobPost::class, 'career_job_post_id');
    }


}
