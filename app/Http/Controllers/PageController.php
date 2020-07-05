<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('page.index');
    }

    public function about()
    {
        return view('page.about');
    }
}
