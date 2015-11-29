<?php

namespace app\Http\Controllers\Api;

use app\Transformer\OrganizationTransformer;
use app\Organization;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends ApiController
{
    public function index()
    {
        $organizations = Organization::limitToUser($this->currentUser)->get();

        return $this->respondWithCollection($organizations, new OrganizationTransformer());
    }

    public function show($organizationsId)
    {
        $organization = Organization::find($organizationsId);

        if (!$organization) {
            return $this->errorNotFound('Organization not found');
        }

        if ($organization->isUser($this->currentUser)) {
            return $this->respondWithItem($organization, new OrganizationTransformer());
        } else {
            return $this->errorForbidden();
        }
    }

    public function update($organizationsId)
    {
        $organization = Organization::find($organizationsId);

        if (!$organization) {
            return $this->errorNotFound('Organization not found');
        }

        // make sure that the user is authorized to update this organization.
        if (!$organization->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $validator = Validator::make(Input::all(), Organization::$organizationUpdateRules);

        if ($validator->passes()) {
            $organization->updateParameters(Input::all());

            return $this->respondWithArray(array('message' => 'The organization has been updated successfully.'));
        } else {
            $messages = print_r($validator->errors()->getMessages(), true);

            return $this->errorInternalError('Input validation error: '. $messages);
        }
    }
}
