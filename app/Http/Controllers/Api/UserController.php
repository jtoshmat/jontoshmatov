<?php

namespace app\Http\Controllers\Api;

use app\cmwn\Image;
use app\Transformer\UserTransformer;
use app\Transformer\GroupTransformer;
use app\User;
use Input;
use app\Transformer\ImageTransformer;
use Illuminate\Support\Facades\Validator;

class UserController extends ApiController
{
    public function index()
    {
        $query = \Request::get('name') or null;

        if ($query) {
            $users = User::name($query)->get();
        } else {
            $users = User::take(10)->get();
        }

        return $this->respondWithCollection($users, new UserTransformer());
    }

    public function show($userId)
    {
        $user = User::findFromInput($userId);

        if (!$user) {
            return $this->errorNotFound('User not found');
        }

        return $this->respondWithItem($user, new UserTransformer());
    }

    public function update($userId)
    {
        $user = User::findFromInput($userId);

            if (!$user->canUpdate($this->currentUser)) {
            return $this->errorInternalError('You are not authorized.');
        }

        $validator = Validator::make(Input::all(), User::$memberUpdateRules);

        if (!$validator->passes()) {
            return $this->errorWrongArgs($validator->errors()->all());
        }

        if ($this->currentUser->updateMember(Input::all())) {
            return $this->respondWithItem($user, new UserTransformer());
        } else {
            return $this->errorInternalError('Could not save user.');
        }
    }

    public function getGroups($userId)
    {
        $user = User::with('groups')->find($userId);

        if (!$user) {
            return $this->errorNotFound('User not found');
        }

        return $this->respondWithCollection($user->groups, new GroupTransformer());
    }

    public function login()
    {
        return csrf_token();
    }

    public function showImage($user_id)
    {
        $image = User::find($user_id)->images;

        return $this->respondWithCollection($image, new ImageTransformer());
    }

    public function updateImage($user_id)
    {
        $user = User::findFromInput($user_id);
        if (!$user->canUpdate($this->currentUser)) {
            return $this->errorInternalError('You are not authorized.');
        }

        $validator = Validator::make(Input::all(), Image::$imageUpdateRules);

        if ($validator->passes()) {
            $user = new User();
            if ($user->updateImage($user_id, Input::all())) {
                return $this->respondWithArray(array('message' => 'The image has been updated sucessfully.'));
            }

            return $this->errorInternalError('The image failed to update');
        }
        $messages = print_r($validator->errors()->getMessages(), true);

        return $this->errorInternalError('Input validation error: '.$messages);
    }

    public function deleteImage($user_id)
    {
        $user = User::findFromInput($user_id);
        if (!$user->canUpdate($this->currentUser)) {
            return $this->errorInternalError('You are not authorized.');
        }

        $validator = Validator::make(Input::all(), Image::$imageUpdateRules);
        if ($validator->passes()) {
            $user = new User();
            if ($user->deleteImage($user_id)) {
                return $this->respondWithArray(array('message' => 'The image has been updated sucessfully.'));
            }

            return $this->errorInternalError('The image failed to delete');
        }
        $messages = print_r($validator->errors()->getMessages(), true);

        return $this->errorInternalError('Input validation error: '.$messages);
    }
}
