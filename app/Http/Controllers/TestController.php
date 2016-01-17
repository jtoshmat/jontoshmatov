<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return view('test');
    }

}
