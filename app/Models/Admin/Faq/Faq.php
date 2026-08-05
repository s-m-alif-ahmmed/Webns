<?php

namespace App\Models\Admin\Faq;

use App\Models\Admin\Blog\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $faq, $faqs, $image, $directory, $imageName, $imageUrl;

    public static function uploadImage($request)
    {
        try {
            if ($request->hasFile('single_image') && $request->file('single_image')->isValid()) {
                self::$image = $request->file('single_image');
                self::$imageName = rand(10000, 20000).self::$image->getClientOriginalName();
                self::$directory = "admin/images/faq/";
                self::$image->move(self::$directory, self::$imageName);
                self::$imageUrl = self::$directory . self::$imageName;
                return self::$imageUrl;
            } else {
                self::$imageUrl = null;
                return self::$imageUrl;
            }
        } catch (\Exception $e) {
            // Log or handle the exception accordingly
            return view('admin.error.error');
        }
    }

    public static function createFaq($request)
    {
        try {
            self::$imageUrl = self::uploadImage($request);
            self::$faq = new Faq();
            self::saveBasicInfo(self::$faq, $request, self::$imageUrl);
            self::$faq->save();
            return self::$faq;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateFaq($request, $id)
    {
        try {
            self::$faq = Faq::find($id);
            if($request->file('single_image'))
            {
                if(file_exists(self::$faq->single_image)){
                    unlink(self::$faq->single_image);
                }
                self::$imageUrl = self::uploadImage($request);
            }
            else{
                self::$imageUrl = self::$faq->single_image;
            }
            self::saveBasicInfo(self::$faq, $request, self::$imageUrl);
            self::$faq->save();
            return self::$faq;
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function deleteFaq($id)
    {
        try {
            self::$faq = Faq::find($id);
            if (file_exists(self::$faq->single_image))
            {
                unlink(self::$faq->single_image);
            }
            self::$faq->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($faq, $request, $imageUrl)
    {
        $faq->single_image              = $imageUrl;
        $faq->user_id                   = $request->user_id;
        $faq->faq_category_id           = $request->faq_category_id;
        $faq->question                  = $request->question;
        $faq->answer                    = $request->answer;
    }

    public function faq_images()
    {
        return $this->hasMany(FaqImage::class);
    }

    public function faq_category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
