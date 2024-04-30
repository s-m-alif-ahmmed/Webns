<?php

namespace App\Models\Admin\Faq;

use App\Models\Admin\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FaqCategory extends Model
{
    use HasFactory;

    private static $faq_category, $faq_categories, $faqCategory, $faq;

    public static function createFaqCategory($request)
    {
        try {
            self::$faq_category       = new FaqCategory();
            self::saveBasicInfo(self::$faq_category, $request);
            self::$faq_category->save();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }

    }

    public static function updateFaqCategory($request, $id)
    {
        try {
            self::$faq_category = FaqCategory::find($id);
            self::saveBasicInfo(self::$faq_category, $request);
            self::$faq_category->save();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteFaqCategory($id)
    {
        try {
            self::$faq_category = FaqCategory::find($id);

            // Delete associated faqs and their images
//            self::$faq_category->faqs->each(function ($faq) {
//                if (file_exists($faq->single_image)) {
//                    unlink($faq->single_image);
//                }
//                $faq->delete();
//            });
//            $faqCategory->faqs->each(function ($faq) {
//                if (file_exists($faq->single_image)) {
//                    unlink($faq->single_image);
//                }
//                $faq->delete();
//            });
            self::$faq_category->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($faq_category, $request)
    {
        self::$faq_category->english     = $request->english;
        self::$faq_category->bangla      = $request->bangla;
    }

    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }

}
