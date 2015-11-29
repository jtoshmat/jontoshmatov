<?php

namespace app\cmwn\Traits;

use app\User;

trait RoleTrait
{
    public static function limitToUser(User $user)
    {
        if ($user->type == 1) {
            return self::query();
        } else {
            return self::whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }
    }

    public function users()
    {
        return $this->morphToMany('app\User', 'roleable');
    }

    public function superAdmins()
    {
        $role_id = (int) \Config::get('mycustomvars.roles.super_admin');

        return $this->morphToMany('app\User', 'roleable')->wherePivot('role_id', $role_id);
    }

    public function admins()
    {
        $role_id = (int) \Config::get('mycustomvars.roles.admin');

        return $this->morphToMany('app\User', 'roleable')->wherePivot('role_id', $role_id);
    }

    public function members()
    {
        $role_id = (int) \Config::get('mycustomvars.roles.member');

        return $this->morphToMany('app\User', 'roleable')->wherePivot('role_id', $role_id);
    }

    public function isUser($user)
    {
        //TODO replace 1 with type constant!
        return ($user->type == 1 || $this->users()->where('user_id', $user->id)->count() > 0);
    }

    public function isSuperAdmin($user)
    {
        return ($user->type == 1 || $this->superAdmins()->where('user_id', $user->id)->count() > 0);
    }

    public function isAdmin($user)
    {
        return ($user->type == 1 || $this->admin()->where('user_id', $user->id)->count() > 0);
    }

    public function isMember($user)
    {
        return ($user->type == 1 || $this->members()->where('user_id', $user->id)->count() > 0);
    }

    public function canUpdate($user)
    {
        return ($user->type == 1 || $this->users()->where('user_id', $user->id)->where('role_id', '>', 1)->count() > 0);
    }
}
