<?php

namespace App\Http\Controllers\Webns;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\Blog;
use App\Models\OutsideUsers\OutsideUser;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('webns.pages.home.index');
    }

    public function contact(){
        return view('webns.pages.contact.contact',[
            'blogs' => Blog::all(),
        ]);
    }

    public function about(){
        return view('webns.pages.about.index');
    }
    public function aboutSingleTeam(){
        return view('webns.pages.about.team-detail');
    }

    public function gallery(){
        return view('webns.pages.gallery.index');
    }
    public function events(){
        return view('webns.pages.events.index');
    }
    public function eventsDetail(){
        return view('webns.pages.events.detail',[
            'outside_users' => OutsideUser::all(),
        ]);
    }
    public function eventsCricketForm(){
        return view('webns.pages.events.tournament.form');
    }
    public function pressRelease(){
        return view('webns.pages.press_release.index');
    }
    public function pressReleaseSingle(){
        return view('webns.pages.press_release.detail');
    }
    public function demoRequest(){
        return view('webns.pages.demo-request.demo_request');
    }

    public function support(){
        return view('webns.pages.support.index');
    }

    public function terms(){
        return view('webns.pages.terms_policy_and_others.terms');
    }

    public function privacy(){
        return view('webns.pages.terms_policy_and_others.privacy-policy');
    }
    public function cookies(){
        return view('webns.pages.terms_policy_and_others.cookies');
    }

    public function error()
    {
        try {
            return view('admin.error.error');
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
}
