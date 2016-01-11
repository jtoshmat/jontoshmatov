<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('public.portfolio');
    }

    public function greenbay(){
        return view('public.portfolio');
    }

}
