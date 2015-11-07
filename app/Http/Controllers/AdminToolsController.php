<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Request;
use app\AdminTool;
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

class AdminToolsController extends Controller
{
    public function uploadCsv(Request $request)
    {
        if (Request::isMethod('post')) {
            $validator = Validator::make(Input::all(), AdminTool::$uploadCsvRules);

            if ($validator->passes()) {
                $file = \Request::file('yourcsv');
	            //the files are stored in storage/app/*files*
                $output = Storage::put('yourcsv.csv', file_get_contents($file));
                if($output){
                    $this->dispatch(new ImportCSV());
                    return Redirect::to('admin/uploadcsv')->with('message', 'The following errors occurred')->withErrors
                    ('Your file has been successfully uploaded. You will receive an email notification once the import is completed.');
                } else {
                    return Redirect::to('admin/uploadcsv')->with('message', 'The following errors occurred')->withErrors
                    ('Something went wrong with your upload. Please try again.');
                }
            }else{
                return Redirect::to('admin/uploadcsv')->with('message', 'The following errors occurred')->withErrors
                ($validator)->withInput();
            }

        }
        return view('admin/uploadcsv');
    }
}
