<?php

namespace app\Http\Controllers\Api;
use app\Transformer\FlipTransformer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use app\Flip;

class FlipController extends ApiController
{
    public function index(){
        $flips = Flip::limitToUser($this->currentUser)->get();
        return $this->respondWithCollection($flips, new FlipTransformer());
    }

    public function show($id){
        $flip = Flip::limitToUser($this->currentUser)->where('id',$id);
        if (!$flip) {
            return $this->errorNotFound('Flip not found');
        }
        return $this->respondWithCollection($flip->get(), new FlipTransformer());
    }

    public function update($id){

        if (!$this->currentUser->isSiteAdmin()){
            return $this->errorUnauthorized();
        }

        $flip = Flip::find($id);

        if (!$flip) {
            return $this->errorNotFound('Flip not found');
        }

        if (!$flip->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $validator = Validator::make(Input::all(), Flip::$flipUpdateRules);
        if (!$validator->passes()) {
            return $this->errorWrongArgs($validator->errors()->all());
        }

        $flip->updateParameters(Input::all());
        return $this->respondWithArray(array('message' => 'The flip has been updated successfully.'));

    }
    public function delete($id){
        $flip = Flip::find($id);

        if (!$flip) {
            return $this->errorNotFound('Flip not found');
        }

        if (!$flip->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $flip->delete();
        return $this->respondWithArray(array('message' => 'The flip has been deleted successfully.'));
    }
}
