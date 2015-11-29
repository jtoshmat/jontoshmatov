<?php

namespace app\Http\Controllers;

use app\User;
use Illuminate\Http\Request;
use app\Http\Requests;
use app\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
		$id = (int) $request->segment(2);
	    $user = User::find($id);
        return view('users.profile', compact('user'));
    }

}
