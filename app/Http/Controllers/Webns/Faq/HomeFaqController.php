<?php

namespace App\Http\Controllers\Webns\Faq;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq\Faq;
use App\Models\Admin\Faq\FaqCategory;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\JsonResponse;

class HomeFaqController extends Controller
{
    public function faq() {
        $faq_images = Faq::with('faq_images');
        $faq_categories = FaqCategory::all();

        return view('webns.pages.faq.index', [
            'faqs' => Faq::all(),
            'faq_categories' => $faq_categories,
            'faq_images' => $faq_images,
        ]);
    }

    public function FaqSearchResult(Request $request)
    {
        try {
            $faq_images = Faq::with('faq_images');
            $faq_categories = FaqCategory::all();
            $searchQuery = $request->input('faq_search');

            if ($searchQuery) {
                $searchFaqs = Faq::where('question', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('answer', 'LIKE', '%' . $searchQuery . '%')
                    ->latest()
                    ->get();

                if ($searchFaqs->isEmpty()) {
                    return redirect()->back()->with('message', 'No matching result found.');
                } else {
                    return view('webns.pages.faq.search.search',[
                        'faqs' => Faq::all(),
                        'faq_categories' => $faq_categories,
                        'faq_images' => $faq_images,
                    ], compact('searchFaqs'));
                }
            } else {
                return redirect()->back()->with('message', 'Please enter a search query.');
            }
        }catch (DecryptException $e) {
            return abort(404);
        }
    }

}
