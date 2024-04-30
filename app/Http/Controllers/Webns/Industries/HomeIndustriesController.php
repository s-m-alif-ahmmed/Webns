<?php

namespace App\Http\Controllers\Webns\Industries;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class HomeIndustriesController extends Controller
{
    public function index()
    {
        try {
            return view('webns.pages.industries.index');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
    public function industriesSingle()
    {
        try {
            return view('webns.pages.industries.detail');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
