<?php

namespace App\Http\Controllers;

class OthersController extends Controller
{
    public function aboutus()
    {
        return view('others.aboutus');
    }

    public function events()
    {
        return view('others.events');
    }
    public function gallery()
    {
        return view('others.gallery');
    }
}
