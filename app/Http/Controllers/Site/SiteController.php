<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home.index');
    }

    public function about()
    {
        return view('site.about.index');
    }

    public function courses()
    {
        return view('site.courses.index');
    }

    public function pricing()
    {
        return view('site.pricing.index');
    }
}
