<?php

namespace app\Transformer;

use app\District;
use League\Fractal\TransformerAbstract;

class DistrictTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'organizations',
        'users',
        'superAdmins',
        'admins',
        'members',
    ];

    /**
     * Turn this item object into a generic array.
     *
     * @return array
     */
    public function transform(District $district)
    {
        return [
            'id' => (int) $district->id,
            'system_id' => (int) $district->system_id,
            'code' => $district->code,
            'title' => $district->title,
            'description' => $district->description,
            'created_at' => (string) $district->created_at,
        ];
    }

    /**
     * Include Organizations.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeOrganizations(District $district)
    {
        $organizations = $district->organizations;

        return $this->collection($organizations, new OrganizationTransformer());
    }

    /**
     * Include Users.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeUsers(District $district)
    {
        $users = $district->users;

        return $this->collection($users, new UserTransformer());
    }

    /**
     * Include SuperAdmins.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeSuperAdmins(District $district)
    {
        $superAdmins = $district->superAdmins;

        return $this->collection($superAdmins, new UserTransformer());
    }

    /**
     * Include Admins.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeAdmins(District $district)
    {
        $admins = $district->admins;

        return $this->collection($admins, new UserTransformer());
    }

    /**
     * Include Members.
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeMembers(District $district)
    {
        $members = $district->members;

        return $this->collection($members, new UserTransformer());
    }
}
