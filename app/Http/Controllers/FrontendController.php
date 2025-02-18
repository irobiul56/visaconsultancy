<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function aboutpage(){
        return inertia::render('About/Aboutpage');
    }
}
