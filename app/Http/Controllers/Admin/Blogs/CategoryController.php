<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Category;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $permissionData = json_decode(Auth::user()->permission, true);
            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['manage_category']) && $permissionData['blogs_all']['blog_categories']['manage_category'] == 'manage_category'){
                return view('admin.blogs.category.manage',[
                    'categories' => Category::all(),
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
            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_create']) && $permissionData['blogs_all']['blog_categories']['category_create'] == 'category_create'){
                return view('admin.blogs.category.index');
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
            Category::createCategory($request);
            return back()->with('message','Category save successfully.');
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
            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_detail']) && $permissionData['blogs_all']['blog_categories']['category_detail'] == 'category_detail'){
                $decryptID = Crypt::decryptString($id);
                $category = Category::find($decryptID);

                if ($category) {
                    return view('admin.blogs.category.detail', [
                        'category' => $category,
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
            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_edit']) && $permissionData['blogs_all']['blog_categories']['category_edit'] == 'category_edit'){
                $decryptID = Crypt::decryptString($id);
                $category = Category::find($decryptID);

                if ($category) {
                    return view('admin.blogs.category.edit', [
                        'category' => $category,
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
            Category::updateCategory($request, $decryptID);
            return back()->with('message','Category update successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeCategoryStatus($id)
    {
        try {
            $category = Category::select('status')->where('id',$id)->first();
            if($category->status == 'active')
            {
                $status = 'inActive';
            }
            elseif($category->status == 'inActive')
            {
                $status = 'active';
            }
            Category::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected category status changed successfully.');
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
            Category::deleteCategory($id);
            return back()->with('message','Category delete successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }
}
