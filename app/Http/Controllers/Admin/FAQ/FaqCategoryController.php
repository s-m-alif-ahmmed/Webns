<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq\Faq;
use App\Models\Admin\Faq\FaqCategory;
use App\Models\Admin\Faq\FaqImage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FaqCategoryController extends Controller
{
    public function index()
    {
        try {
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['manage_category']) && $permissionData['blogs_all']['blog_categories']['manage_category'] == 'manage_category'){
                return view('admin.faq.category.manage',[
                    'faq_categories' => FaqCategory::all(),
                ]);
//            }else{
//                return view('admin.error.error');
//            }
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
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_create']) && $permissionData['blogs_all']['blog_categories']['category_create'] == 'category_create'){
                return view('admin.faq.category.index');
//            }else{
//                return view('admin.error.error');
//            }
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
            FaqCategory::createFaqCategory($request);
            return back()->with('message','Faq Category save successfully.');
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
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_detail']) && $permissionData['blogs_all']['blog_categories']['category_detail'] == 'category_detail'){
                $decryptID = Crypt::decryptString($id);
                $faq_category = FaqCategory::find($decryptID);

                if ($faq_category) {
                    return view('admin.faq.category.detail', [
                        'faq_category' => $faq_category,
                    ]);
                } else {
                    return view('admin.error.error');
                }
//            }else{
//                return view('admin.error.error');
//            }
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
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_edit']) && $permissionData['blogs_all']['blog_categories']['category_edit'] == 'category_edit'){
                $decryptID = Crypt::decryptString($id);
                $faq_category = FaqCategory::find($decryptID);

                if ($faq_category) {
                    return view('admin.faq.category.edit', [
                        'faq_category' => $faq_category,
                    ]);
                } else {
                    return view('admin.error.error');
                }
//            }else{
//                return view('admin.error.error');
//            }
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
            FaqCategory::updateFaqCategory($request, $decryptID);
            return redirect('/faq-category')->with('message','Faq Category update successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeFaqCategoryStatus($id)
    {
        try {
            $faq_category = FaqCategory::select('status')->where('id',$id)->first();
            if($faq_category->status == 'active')
            {
                $status = 'inActive';
            }
            elseif($faq_category->status == 'inActive')
            {
                $status = 'active';
            }
            FaqCategory::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected faq category status changed successfully.');
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
            FaqCategory::deleteFaqCategory($id);
            return back()->with('message','Faq Category delete successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }
}
