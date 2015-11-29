<?php

namespace app\Http\Controllers\Api;

use app\Transformer\DistrictTransformer;
use app\District;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DistrictController extends ApiController
{
    public function index()
    {
        $districts = District::limitToUser($this->currentUser)->get();

        return $this->respondWithCollection($districts, new DistrictTransformer());
    }

    public function show($districtsId)
    {
        $district = District::find($districtsId);

        if (!$district) {
            return $this->errorNotFound('District not found');
        }

        // make sure that the user is authorized to view this district.
        if (!$district->isUser($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        return $this->respondWithItem($district, new DistrictTransformer());
    }

    public function update($districtsId)
    {
        $district = District::find($districtsId);

        if (!$district) {
            return $this->errorNotFound('District not found');
        }

        // make sure that the user is authorized to update this district.
        if (!$district->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $validator = Validator::make(Input::all(), District::$districtUpdateRules);

        if ($validator->passes()) {
            $district->updateParameters(Input::all());

            return $this->respondWithArray(array('message' => 'The district has been updated successfully.'));
        } else {
            $messages = print_r($validator->errors()->getMessages(), true);

            return $this->errorInternalError('Input validation error: '. $messages);
        }
    }
}
