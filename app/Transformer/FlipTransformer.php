<?php

namespace app\Transformer;

use app\Flip;
use League\Fractal\TransformerAbstract;

class FlipTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'users',

    ];

    /**
     * Turn this item object into a generic array.
     *
     * @return array
     */
    public function transform(Flip $flip)
    {
        return [
            'id'              => (int) $flip->id,
            'title'           => $flip->title,
            'description'     => $flip->description,
            'created_at'      => (string) $flip->created_at,
        ];
    }

    /**
     * Embed User.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeUsers(Flip $flip)
    {
        $users = $flip->users;
        return $this->collection($users, new UserTransformer());
    }

}
