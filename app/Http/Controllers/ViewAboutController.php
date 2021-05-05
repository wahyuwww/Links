<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class ViewAboutController extends Controller
{
    public function index(){
        $about = About::all();
        return view('viewabout.index', compact('about'));
    }
}
