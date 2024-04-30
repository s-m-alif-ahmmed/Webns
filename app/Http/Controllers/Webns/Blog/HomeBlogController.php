<?php

namespace App\Http\Controllers\Webns\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Blog\Category;
use App\Models\Admin\Blog\Tag;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class HomeBlogController extends Controller
{
    public function blog() {
        try {
            try {
                $tags = Tag::all();
                $categories = Category::all();
                $blogs = Blog::latest()
                    ->where('status', 'Publish')
                    ->paginate(3);

                return view('webns.pages.blog.index', [
                    'tags' => $tags,
                    'categories' => $categories,
                    'blogs' => $blogs,
                ]);
            }catch (ModelNotFoundException $e) {
                return view('admin.error.error');
            }
        }catch (DecryptException $e) {
            return view('admin.error.error');
        }

    }

    public function blogSingle($slug_title) {
        try {
            try {
                $tags = Tag::all();
                $categories = Category::all();
                $blog = Blog::query()
                    ->where('status', 'Publish')
                    ->where('slug', $slug_title)
                    ->firstOrFail();
                $blogs = Blog::all();

                return view('webns.pages.blog.detail', [
                    'tags' => $tags,
                    'categories' => $categories,
                    'blog' => $blog,
                    'blogs' => $blogs,
                ]);
            }catch (ModelNotFoundException $e) {
                return view('admin.error.error');
            }
        }catch (DecryptException $e) {
            return view('admin.error.error');
        }
    }

}
