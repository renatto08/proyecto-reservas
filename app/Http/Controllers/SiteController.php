<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        return view('landing.home');
    }

    public function about()
    {
        return view('landing.about');
    }

    public function contact()
    {
        return view('landing.contact');
    }
    public function catalogo()
    {
        return view('landing.catalogo');
    }
}
