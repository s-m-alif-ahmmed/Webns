<?php

namespace App\Models\Admin\Faq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqImage extends Model
{
    use HasFactory;

    private static $faqImage, $faqImages, $image, $imageName, $directory, $imageUrl, $extension;

    private static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(10000, 20000).'.'.self::$extension; // 132131.jpg
        self::$directory = 'admin/images/faq/faq-images/';
        $image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function createFaqImage($request, $id)
    {
        if ($request->has('image') && is_array($request->image)) {
            foreach ($request->image as $image) {
                self::$faqImage = new FaqImage();
                self::$faqImage->faq_id = $id;
                self::$faqImage->image = self::getImageUrl($image);
                self::$faqImage->save();
            }
        }
    }

    public static function updateFaqImage($request, $id)
    {
        self::deleteFaqImage($id);
        self::CreateFaqImage($request, $id);
    }

    public static function deleteFaqImage($id){
        self::$faqImages = FaqImage::where('faq_id', $id)->get();
        foreach (self::$faqImages as $faqImage)
        {
            if (file_exists($faqImage->image))
            {
                unlink($faqImage->image);
            }
            $faqImage->delete();
        }
    }

}
