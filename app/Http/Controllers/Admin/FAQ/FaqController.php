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

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
//            $permissionData = json_decode(Auth::user()->permission, true);
//            if($permissionData && isset($permissionData['blogs_all']['blogs']['manage_blog']) && $permissionData['blogs_all']['blogs']['manage_blog'] == 'manage_blog'){
                return view('admin.faq.faq.manage',[
                    'faqs' => Faq::all(),
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
//            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create'){
                return view('admin.faq.faq.index',[
                    'faq_categories'    => FaqCategory::all(),
                ]);
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
            $this->faq = Faq::createFaq($request);
            FaqImage::createFaqImage($request, $this->faq->id);
            return back()->with('message', 'Faq saved successfully.');
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
//            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_detail']) && $permissionData['blogs_all']['blogs']['blog_detail'] == 'blog_detail'){
            $decryptID = Crypt::decryptString($id);
            $faq = Faq::find($decryptID);
            $faq_images = Faq::with('faq_images')->find($decryptID);

            if ($faq) {
                return view('admin.faq.faq.detail', [
                    'faq' => $faq,
                    'faq_images' => $faq_images->faq_images, // Use the correct relationship name
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
//            if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_edit']) && $permissionData['blogs_all']['blogs']['blog_edit'] == 'blog_edit'){
                $decryptID = Crypt::decryptString($id);
                $faq = Faq::find($decryptID);
                $faq_images = Faq::with('faq_images')->find($decryptID);

                if ($faq) {
                    return view('admin.faq.faq.edit', [
                        'faq'       => $faq,
                        'faq_categories' => FaqCategory::all(),
                        'faq_images' => $faq_images->faq_images,
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
            $faq = Faq::updateFaq($request, $decryptID);
            if ($request->file('faq_image'))
            {
                FaqImage::updateFaqImage($request, $faq->id);
            }
            return back()->with('message','Faq update successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeFaqStatus($id)
    {
        try {
            $faq = Faq::select('status')->where('id',$id)->first();
            if($faq->status == 'active')
            {
                $status = 'inActive';
            }
            elseif($faq->status == 'inActive')
            {
                $status = 'active';
            }
            Faq::where('id',$id)->update(['status' => $status ]);
            return back()->with('message','Selected Faq status changed successfully.');
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
            Faq::deleteFaq($id);
            FaqImage::deleteFaqImage($id);
            return back()->with('message','Faq delete successfully.');
        } catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }
}
