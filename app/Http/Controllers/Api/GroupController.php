<?php

namespace app\Http\Controllers\Api;

use app\Transformer\UserTransformer;
use app\Transformer\GroupTransformer;
use app\User;
use app\Group;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GroupController extends ApiController
{
    public function index()
    {
        $groups = Group::limitToUser($this->currentUser)->get();

        return $this->respondWithCollection($groups, new GroupTransformer());
    }

    public function show($groupId)
    {
        $group = Group::find($groupId);

        if (!$group) {
            return $this->errorNotFound('Group not found');
        }

        // make sure that the user is authorized to view this group.
        if (!$group->isUser($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        return $this->respondWithItem($group, new GroupTransformer());
    }

    public function update($groupId)
    {
        $group = Group::find($groupId);

        if (!$group) {
            return $this->errorNotFound('Group not found');
        }

        // make sure that the user is authorized to update this group.
        if (!$group->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $validator = Validator::make(Input::all(), Group::$groupUpdateRules);

        if ($validator->passes()) {
            $group->updateParameters(Input::all());

            return $this->respondWithArray(array('message' => 'The group has been updated successfully.'));
        } else {
            $messages = print_r($validator->errors()->getMessages(), true);

            return $this->errorInternalError('Input validation error: '. $messages);
        }
    }

    public function getUsers($groupId)
    {
        $group = Group::find($groupId);

        if (!$group) {
            return $this->errorNotFound('User not found');
        }

        return $this->respondWithCollection($group->users, new UserTransformer());
    }
}
