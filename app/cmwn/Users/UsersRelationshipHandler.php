<?php

namespace app\cmwn\Users;

use app\User;

class UsersRelationshipHandler
{
    const MEMBER_ID = 3;
    const MEMBER_TEACHER_ID = 2;

    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const MEMBER = 3;

    public static function areWeFriends($user_id, $friend_id)
    {
        return User::whereHas('friends', function ($query) use ($friend_id, $user_id) {
            $query->where('status', 0)->where('friend_id', $friend_id)->where('user_id', $user_id);
        });
    }

    public static function areWeInSameClass($user_id, $friend_id)
    {
        $groups = User::find($user_id)->groups->lists('id');

        return User::find($friend_id)->whereHas('groups', function ($query) use ($groups, $friend_id, $user_id) {
            $query->whereIn('roleable_id', $groups)->whereIn('role_id', array(self::MEMBER_ID))->where('user_id',
                $friend_id);
        });
    }

    public static function isUserInSameEntity($admin, $member, $entity)
    {
        $admin_entities = $admin->entities($entity,
            array(self::ADMIN, self::SUPER_ADMIN))->lists('roleable_id')->toArray();
        $member_entites = $member->entities($entity, array(self::MEMBER))->lists('roleable_id')->toArray();

        // empty array (result of array_intersect) will evaluate to false when cast to a boolean.
        return (boolean)array_intersect($admin_entities, $member_entites);
    }

    public static function areMembersOfSameEntity($member1, $member2, $entity)
    {
        $member1_entities = $member1->entities($entity, array(self::MEMBER))->lists('roleable_id')->toArray();
        $member2_entites = $member2->entities($entity, array(self::MEMBER))->lists('roleable_id')->toArray();

        // empty array (result of array_intersect) will evaluate to false when cast to a boolean.
        return (boolean)array_intersect($member1_entities, $member2_entites);
    }

    public static function areAdminOfSameEntity($admin1, $admin2, $entity)
    {

        $admin1_entities = $admin1->groups()->where(function ($query){
            $query = $query->whereIn('role_id', [self::ADMIN, self::SUPER_ADMIN]);
        })->lists('organization_id')->toArray();

        $admin2_entities = $admin2->groups()->where(function ($query){
            $query = $query->whereIn('role_id', [self::ADMIN, self::SUPER_ADMIN]);
        })->lists('organization_id')->toArray();

        return (boolean)array_intersect($admin1_entities, $admin2_entities);
    }
}
