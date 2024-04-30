<?php

namespace App\Models\Admin\Career;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CareerJobPost extends Model
{
    use HasFactory;

    private static $job_post, $job_posts;

    public static function createJobPost($request)
    {
        try {
            self::$job_post = new CareerJobPost();
            self::saveBasicInfo(self::$job_post, $request);
            self::$job_post->save();
            return self::$job_post;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateJobPost($request, $id)
    {
        try {
            self::$job_post = CareerJobPost::find($id);

//            if (!self::$job_post) {
//                // Handle the case where the job post is not found
//                return view('admin.error.error');
//            }

            self::saveBasicInfo(self::$job_post, $request);
            self::$job_post->save(); // Use update() instead of save()
            return self::$job_post;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }


    public static function deleteJobPost($id)
    {
        try {
            self::$job_post = CareerJobPost::find($id);
            self::$job_post->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($job_post, $request)
    {
        $job_post->career_department_id         = $request->career_department_id;
        $job_post->career_designation_id        = $request->career_designation_id;
        $job_post->prefix_id                    = $request->prefix_id;
        $job_post->job_title                    = $request->job_title;
        $job_post->job_type                     = $request->job_type;
        $job_post->vacancy                      = $request->vacancy;
        $job_post->experience                   = $request->experience;
        $job_post->location                     = $request->location;
        $job_post->salary                       = $request->salary;
        $job_post->job_description              = $request->job_description;
        $job_post->deadline                     = $request->deadline;
        $job_post->status = $request->has('status') ? $request->status : 'Publish';
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function($job_post){
            $job_post->slug_job_title = Str::slug($job_post->job_title, '-');
        });
        self::updating(function($job_post){
            $job_post->slug_job_title = Str::slug($job_post->job_title, '-');
        });
    }

    public function career_department()
    {
        return $this->belongsTo(CareerDepartment::class, 'career_department_id');
    }

    public function career_designation()
    {
        return $this->belongsTo(CareerDesignation::class, 'career_designation_id');
    }

    public function career_job_application()
    {
        return $this->hasMany(CareerJobApplication::class, 'career_job_post_id');
    }


}
