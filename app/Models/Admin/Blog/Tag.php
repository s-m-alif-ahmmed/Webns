<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $tag, $tags;

    public static function createTag($request)
    {
        try {
            self::$tag       = new Tag();
            self::saveBasicInfo(self::$tag, $request);
            self::$tag->save();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    public static function updateTag($request, $id)
    {
        try {
            self::$tag = Tag::find($id);
            self::saveBasicInfo(self::$tag, $request);
            self::$tag->save();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }


    public static function deleteTag($id)
    {
        try {
            self::$tag = Tag::find($id);
            self::$tag->delete();
        } catch (ModelNotFoundException $e) {
            return view('admin.error.error');
        }
    }

    private static function saveBasicInfo($tag, $request)
    {
        self::$tag->name      = $request->name;
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }


}
