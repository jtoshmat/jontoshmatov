<?php

namespace app\Http\Controllers\Api;

use app\cmwn\Users\UsersRelationshipHandler;
use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use app\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends ApiController
{
    const MEMBER_ID =3;

    public function show(){
        return User::find($this->currentUser)->friendrequests->lists('id');
    }

    public function accept(){
        $friend_id = \Request::segment(3);
        return $this->executeRequest($friend_id, 1);
    }

    public function reject(){
        $friend_id = \Request::segment(3);
        return $this->executeRequest($friend_id, -1);
    }

    public function ignore(){
        $friend_id = \Request::segment(3);
        return $this->executeRequest($friend_id, -2);
    }

    public function executeRequest($friend_id, $status){
        list(, $caller) = debug_backtrace(false);
        $requestedFunction = $caller['function'];

        $isRequestLegit = UsersRelationshipHandler::areWeFriends($this->currentUser, $friend_id);
        if ($isRequestLegit->count()==0){
            return $this->errorInternalError('No active friend request found.');
        }
        $areWeInTheSameClass = UsersRelationshipHandler::areWeInSameClass($this->currentUser, $friend_id);
        if ($areWeInTheSameClass->count()==0){
            return $this->errorInternalError('Sorry you are not in the same class as a student.');
        }

        if ($requestedFunction == 'ignore'){
            //@TODO: maybe schedule it so it will send a reminder in certain days to the user.
            //status is set to -2 and in certain days we will set back to status = 0
            return $this->respondWithArray(array('message' => 'ignore option has not been discussed.'));
        }

        User::find($friend_id)->friends()->sync(array($this->currentUser));
        User::find($this->currentUser)->friends()->updateExistingPivot($friend_id,array('status'=>$status));
        User::find($this->currentUser)->friendrequests()->updateExistingPivot($friend_id,array('status'=>$status));

        if ($requestedFunction == 'reject'){
            User::find($friend_id)->friends()->detach(array($this->currentUser));
        }

        return $this->respondWithArray(array('message' => 'friend request has been updated.'));
    }
}
