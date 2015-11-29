<?php

namespace app\Http\Controllers\Api;

use app\Http\Controllers\Api\ApiController;
use app\Transformer\RoleTransformer;
use app\Role;

class RoleController extends ApiController
{
    public function index()
    {
        $roles =Role::take(10)->get();

        return $this->respondWithCollection($roles, new RoleTransformer);
    }

    public function show($rolesId)
    {
        $role = Role::find($rolesId);

        if (! $role) {
            return $this->errorNotFound('Role not found');
        }

        return $this->respondWithItem($role, new RoleTransformer);
    }

}
