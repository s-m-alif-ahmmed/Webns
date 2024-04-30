<?php

namespace App\Http\Controllers\Webns\Career;

use App\Http\Controllers\Controller;
use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use App\Models\Admin\Career\CareerJobPost;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeCareerController extends Controller
{
    public function career(){
        $career_jop_posts = CareerJobPost::latest()->paginate(10);
        return view('webns.pages.career.index',[
            'career_departments' => CareerDepartment::all(),
            'career_designations' => CareerDesignation::all(),
            'career_jop_posts' => $career_jop_posts,
        ]);
    }

    public function jobPostDetail($slug_job_title) {
        try {
            try {
                $career_departments = CareerDepartment::all();
                $career_designations = CareerDesignation::all();
                $career_job_post = CareerJobPost::query()
                    ->where('status', 'Publish')
                    ->where('slug_job_title', $slug_job_title)
                    ->firstOrFail();

                return view('webns.pages.career.detail', [
                    'career_departments' => $career_departments,
                    'career_designations' => $career_designations,
                    'career_job_post' => $career_job_post,
                ]);
            }catch (ModelNotFoundException $e) {
                return view('admin.error.error');
            }
        }catch (DecryptException $e) {
            return view('admin.error.error');
        }

    }


}
