<?php
namespace app\Http\Controllers\Api;
use app\Group;
use app\Http\Controllers\Api\ApiController;
use app\District;
use app\Organization;
use app\User;
use Illuminate\Http\Request;
use app\Http\Requests;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use app\Transformer\UserTransformer;
use Illuminate\Support\Facades\Auth;

class SuggestedController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->respondWithCollection($this->getAllSuggestedFriends(), new UserTransformer);
    }

    protected function getAllSuggestedFriends(){
        $suggestedfriends = Auth::user()->suggestedfriends();
        return $suggestedfriends;
    }
}
