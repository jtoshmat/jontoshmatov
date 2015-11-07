<?php

namespace app\Http\Controllers;

use app\cmwn\Services\ImageManagement;
use Illuminate\Support\Facades\Request;

use app\Jobs\ImportCSV;
use app\User;
use Illuminate\Support\Facades\Hash;
use app\Http\Requests;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use app\AdminTool;

class AdminTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.testupload');
    }


    public function uploadImage(Request $request)
    {
	    $data = null;

	    if (Request::isMethod('post')) {
            $validator = Validator::make(Input::all(), AdminTool::$uploadImageRules);
            if ($validator->passes()) {
                $file = \Request::file('yourfile');
                //the files are stored in storage/app/*files*
                $output = Storage::put('yourfile.png', file_get_contents($file));
	            $cloudinary = ImageManagement::uploader($file);
	            echo cl_image_tag($cloudinary['url'], array( "alt" => "Sample Image" ));
	            echo "<hr />";
	            dd($cloudinary);
	            if($cloudinary){
		            return Redirect::to('admin/playground')->with('data', $cloudinary)->with('message', 'The following errors occurred')->withErrors
                    ('Your image has uploaded by using Cloudinary.');
                }else {
                    return Redirect::to('admin/playground')->with('message', 'The following errors occurred')->withErrors
                    ('Something went wrong with your upload. Please try again.');
                }
            }else{
                return Redirect::to('admin/playground')->with('message', 'The following errors occurred')->withErrors
                ($validator)->withInput();
            }

        }
        return view('admin/testupload',compact($data));
    }

}
