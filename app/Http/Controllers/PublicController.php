<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function welcome()
    {
        return view('welcome');
    }

    public function aboutme(){
        return view('public.aboutme');
    }

    public function portfolio(){
        return view('public.portfolio');
    }

    public function amfam(){
        $img = (string) \Request::segment(3);
        $img = url('/img/projects/amfam/'.$img.'.png');
        return view('public.projects.amfam.amfam', compact('img'));
    }

    public function greenbay(){
        return view('public.projects.amfam.amfam');
    }

}
