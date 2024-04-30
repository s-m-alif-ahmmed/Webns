<?php

namespace App\Http\Controllers\Webns\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeServiceController extends Controller
{
    public function index()
    {
        return view('webns.pages.services.index');
    }
    public function serviceSingle()
    {
        return view('webns.pages.services.detail');
    }
}
