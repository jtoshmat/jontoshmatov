<?php

namespace app\Http\Controllers\Api;

use app\Http\Controllers\Api\ApiController;
use app\Transformer\RoleTransformer;
use app\Transformer\MasterTransformer;
use app\cmwn\Users\UserSpecificRepository;
use app\Repositories\SideBarItems;
use Illuminate\Http\Request;
use app\Http\Requests;
use app\AdminTool;
use app\Jobs\ImportCSV;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use cmwn\UserImage;

class MasterController extends ApiController
{
    public function sidebar()
    {
        $userspecific = new SideBarItems();
        $sidebar = $userspecific->getAll();
        $sidebar = array('tags'=>$sidebar);
        return $this->respondWithCollection($sidebar, new MasterTransformer);
    }

    public function friends()
    {
        $sidebar = new SideBarItems();
        $friends = new UserSpecificRepository($sidebar);
        $friends = $friends->friendsForApi();
        return $friends;
    }

    public function importExcel(Request $request){
        if (\Request::isMethod('post')) {
            $validator = Validator::make(\Input::all(), AdminTool::$uploadCsvRules);
            if ($validator->passes()) {
                $file = \Request::file('yourcsv');
                $organization_id = (int) \Request::get('organization_id');

                if(!$organization_id){
                    return $this->errorInternalError('User input error: Organization id is missing.');
                }

                if ($file==''){
                    return $this->errorInternalError('User input error: Your Excel file is empty or invalid format.');
                }

                //the files are stored in storage/app/*files*
                $user_id = Auth::user()->id;
                $file_name = $file->getFilename()."_userid".$user_id."_time".time();
                $extension = $file->getClientOriginalExtension();
                $full_file_name = $file_name.".".$extension;
                $output = Storage::disk('local')->put($file_name.'.'.$extension,  \File::get($file));

                if($output){
                    $data = array(
                        'file' =>$full_file_name,
                        'parms' => array('organization_id' => $organization_id)
                    );
                    $this->dispatch(new ImportCSV($data));
                    return $this->respondWithArray(array('message' => 'The import has been completed successfully.'));
                } else {
                    return $this->errorInternalError('The import has failed. Please try again.');
                }
            }else{
                $messages = print_r($validator->errors()->getMessages(), true);
                return $this->errorInternalError('Input validation error: '. $messages);
            }
        }
        return false;
    }
}
