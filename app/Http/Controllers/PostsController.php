<?php

namespace app\Http\Controllers;

use app\Post;
use app\User;
use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::with('posts')->get();
        return $posts;
        return view('posts', compact('posts'));
    }


}
