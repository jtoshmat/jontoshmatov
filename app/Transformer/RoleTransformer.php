<?php

namespace app\Transformer;

use app\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [];

    /**
     * Turn this item object into a generic array.
     *
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'id'            => (int) $role->id,
            'title'         => $role->title,
            'description'   => $role->description,
            'created_at'    => (string) $role->created_at,
        ];
    }
}
