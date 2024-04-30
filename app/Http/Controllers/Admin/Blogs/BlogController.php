<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Blog\Category;
use App\Models\Admin\Blog\Tag;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blogs']['manage_blog']) && $permissionData['blogs_all']['blogs']['manage_blog'] == 'manage_blog'){
                return view('admin.blogs.blog.manage',[
                    'blogs' => Blog::all(),
                ]);
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create'){
                $tags = Tag::all();
                return view('admin.blogs.blog.index',[
                    'categories'    => Category::all(),
                ],compact('tags'));
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $blog = Blog::createBlog($request);
            if ($request->has('tags')) {
                $blog->tags()->attach($request->tags);
            }
            return back()->with('message', 'Blog saved successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_detail']) && $permissionData['blogs_all']['blogs']['blog_detail'] == 'blog_detail'){
                $decryptID = Crypt::decryptString($id);
                $blog = Blog::find($decryptID);

                if ($blog) {
                    return view('admin.blogs.blog.detail', [
                        'blog' => $blog,
                    ]);
                } else {
                    return view('admin.error.error');
                }
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function preview(string $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_detail']) && $permissionData['blogs_all']['blogs']['blog_detail'] == 'blog_detail'){
                $decryptID = Crypt::decryptString($id);
                $blog = Blog::find($decryptID);

                if ($blog) {
                    return view('admin.blogs.blog.preview', [
                        'blog' => $blog,
                    ]);
                } else {
                    return view('admin.error.error');
                }
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_edit']) && $permissionData['blogs_all']['blogs']['blog_edit'] == 'blog_edit'){
                $decryptID = Crypt::decryptString($id);
                $blog = Blog::find($decryptID);
                $tags = Tag::all();

                if ($blog) {
                    return view('admin.blogs.blog.edit', [
                        'blog'       => $blog,
                        'categories' => Category::all(),
                    ],compact('tags'));
                } else {
                    return view('admin.error.error');
                }
            }else{
                return view('admin.error.error');
            }
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $blog = Blog::updateBlog($request, $decryptID);
            $blog->tags()->sync($request->tags);
            return back()->with('message','Blog update successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeBlogStatus($id)
    {
        try {
            $blog = Blog::select('status')->where('id',$id)->first();
            if($blog->status == 'Publish')
            {
                $status = 'Draft';
            }
            elseif($blog->status == 'Draft')
            {
                $status = 'Publish';
            }
            Blog::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected blog status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }


    /**
     * Change Status popular blog the specified resource.
     */
    public function changePopularBlogStatus($id)
    {
        try {
            $blog = Blog::select('popular_status')->where('id',$id)->first();
            if($blog->popular_status == 'active')
            {
                $popularStatus = 'inActive';
            }
            elseif($blog->popular_status == 'inActive')
            {
                $popularStatus = 'active';
            }
            Blog::where('id',$id)->update(['popular_status' => $popularStatus ]);
            return back()->with('message','Selected blog popular status changed successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Blog::deleteBlog($id);
            return back()->with('message','Blog delete successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

}
