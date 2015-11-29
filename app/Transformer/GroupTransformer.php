<?php

namespace app\Transformer;

use app\Group;
use League\Fractal\TransformerAbstract;

class GroupTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'users',
        'superAdmins',
        'admins',
        'members',
        'suggestedfriends'
    ];

    /**
     * Turn this item object into a generic array.
     *
     * @return array
     */
    public function transform(Group $group)
    {
        return [
            'id'              => (int) $group->id,
            'organization_id' => $group->organization_id,
            'title'           => $group->title,
            'description'     => $group->description,
            'created_at'      => (string) $group->created_at,
        ];
    }

    /**
     * Include Users.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeUsers(Group $group)
    {
        $users = $group->users;
        return $this->collection($users, new UserTransformer());
    }

    /**
     * Include SuperAdmins.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeSuperAdmins(Group $group)
    {
        $superAdmins = $group->superAdmins;
        return $this->collection($superAdmins, new UserTransformer());
    }

    /**
     * Include Admins.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeAdmins(Group $group)
    {
        $admins = $group->admins;
        return $this->collection($admins, new UserTransformer());
    }

    /**
     * Include Members.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeMembers(Group $group)
    {
        $members = $group->members;

        return $this->collection($members, new UserTransformer());
    }

    /**
     * Embed Suggested Friends.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeSuggestedFriends(Group $group)
    {
        $suggestedfriends = $group->suggestedfriends();
        return $this->collection($suggestedfriends, new UserTransformer());
    }
}
