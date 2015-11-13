<?php

namespace JobsArt\Http\Controllers;

use Illuminate\Http\Request;

use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Entities\Modules\SlideShow\Slideshow;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $slides = Slideshow::all();

        $i = 0;

        return view('layouts.index', compact('slides'));
        //return view('slider', compact('slides'));
    }



}
