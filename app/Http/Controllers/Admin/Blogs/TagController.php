<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Tag;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blog_tags']['manage_tag']) && $permissionData['blogs_all']['blog_tags']['manage_tag'] == 'manage_tag'){
                return view('admin.blogs.tag.manage',[
                    'tags' => Tag::all(),
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
            if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_create']) && $permissionData['blogs_all']['blog_tags']['tag_create'] == 'tag_create'){
                return view('admin.blogs.tag.index');
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
            Tag::createTag($request);
            return back()->with('message','Tag save successfully.');
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
            if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_detail']) && $permissionData['blogs_all']['blog_tags']['tag_detail'] == 'tag_detail'){
                $decryptID = Crypt::decryptString($id);
                $category = Tag::find($decryptID);

                if ($category) {
                    return view('admin.blogs.tag.detail', [
                        'tag' => $category,
                    ]);
                } else {
                    return abort(404);
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
            if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_edit']) && $permissionData['blogs_all']['blog_tags']['tag_edit'] == 'tag_edit'){
                $decryptID = Crypt::decryptString($id);
                $category = Tag::find($decryptID);

                if ($category) {
                    return view('admin.blogs.tag.edit', [
                        'tag' => $category,
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            Tag::updateTag($request, $decryptID);
            return back()->with('message','Tag update successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

    /**
     * Change Status the specified resource.
     */
    public function changeTagStatus($id)
    {
        try {
            $tag = Tag::select('status')->where('id',$id)->first();
            if($tag->status == 'active')
            {
                $status = 'inActive';
            }
            elseif($tag->status == 'inActive')
            {
                $status = 'active';
            }
            Tag::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected tag status changed successfully.');
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
            Tag::deleteTag($id);
            return back()->with('message','Tag delete successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }
}
