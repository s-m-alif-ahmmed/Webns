<?php

namespace App\Http\Controllers\Webns\ToolsAndPlatform;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class HomeToolsAndPlatformController extends Controller
{
    public function index()
    {
        try {
            return view('webns.pages.tools_and_platform.index');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
    public function toolsSingle()
    {
        try {
            return view('webns.pages.tools_and_platform.detail');
        }catch (DecryptException $e){
            return view('admin.error.error');
        }
    }
}
