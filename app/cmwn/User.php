<?php

namespace app;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use app\cmwn\Image;
use Auth;

use app\cmwn\Traits\RoleTrait;

use app\cmwn\Users\UsersRelationshipHandler;


class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes, RoleTrait;
    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'uuid',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
     * Register all the form validation rules here for User
     */
    public static $memberUpdateRules = array(
        'first_name' => 'string|min:2',
        'middle_name' => 'string|min:2',
        'last_name' => 'string|min:2',
        'email' => 'email|min:2',
        'uuid' => 'string|unique:users|min:2',
    );

    public static $memberDeleteRules = array(
        //'id'=>'required|regex:/^[0-9]?$/',
    );

    public static $passwordUpdateRules = array(
        'user_id' => 'required|int',
        'current_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    );

    public function guardianReference()
    {
        return $this->belongsToMany('app\User', 'guardian_reference', 'student_id');
    }

    public function assignRoles()
    {
        return $this->morphedByMany('app\Role', 'roleable');
    }

    public function role()
    {
        return $this->morphedByMany('app\Role', 'roleable')->withPivot('role_id');
    }

    public function districts()
    {
        return $this->morphedByMany('app\District', 'roleable')->withPivot('role_id');
    }

    public function organizations()
    {
        return $this->morphedByMany('app\Organization', 'roleable')->withPivot('role_id');
    }

    public function groups()
    {
        return $this->morphedByMany('app\Group', 'roleable')->withPivot('role_id');
    }

    public function children()
    {
        return $this->belongsToMany('app\User', 'child_guardian', 'guardian_id', 'child_id');
    }

    public function guardians()
    {
        return $this->belongsToMany('app\User', 'child_guardian', 'child_id', 'guardian_id');
    }

    public function friends()
    {
        return $this->belongsToMany('app\User', 'friends', 'user_id', 'friend_id');
    }

    public function students()
    {
    }

    public function games()
    {
        return $this->belongsToMany('app\Game');
    }

    public function flips()
    {
        return $this->morphedByMany('app\Flip', 'roleable')->withPivot('role_id');
    }

    public static function findFromInput($input)
    {
        if ($input ==  'me') {
            return Auth::user();
        } else {
            return self::find($input);
        }
    }

    /**
     * Determins if user is a site admin.
     *
     * @return bool
     */
    public function isSiteAdmin()
    {
        return ($this->type == 1);
    }

    /**
     * Determins if one user can update another.
     *
     * @return bool
     */
    public function canUpdate(User $user)
    {
         return ($this->id == $user->id || $user->isSiteAdmin() ||
                 UsersRelationshipHandler::isUserInSameEntity($user, $this, 'districts') ||
                 UsersRelationshipHandler::isUserInSameEntity($user, $this, 'organizations') ||
                 UsersRelationshipHandler::isUserInSameEntity($user, $this, 'groups'));
    }

    public function canbeFriend(User $user){
        return (UsersRelationshipHandler::areMembersOfSameEntity($user, $this, 'groups') || UsersRelationshipHandler::areAdminOfSameEntity($user, $this, 'groups'));
    }

    public function entities($entity, $role_ids) //@TODO fix this bug
    {
        $result = $this->$entity();
        $result = $result->where(function ($query) use ($role_ids) {
            $query = $query->whereIn('role_id', $role_ids);
        });
        return $result;
    }

    public function acceptedfriends()
    {
        return $this->belongsToMany('app\User', 'friends', 'user_id', 'friend_id')->wherePivot('status', 1);
    }

    public function pendingfriends()
    {
        return $this->belongsToMany('app\User', 'friends', 'user_id', 'friend_id')->wherePivot('status', 0);
    }

    public function friendrequests()
    {
        return $this->belongsToMany('app\User', 'friends', 'friend_id')->wherePivot('friend_id', $this->id)->wherePivot('status', 0);
    }

    public function blockedrequests()
    {
        return $this->belongsToMany('app\User', 'friends', 'user_id', 'friend_id')->wherePivot('status', -2);
    }

    public function suggestedfriends()
    {
        $groups = $this->groups->lists('id');
        $roles = $this->role->lists('id');
        $suggested = self::whereHas('groups', function ($query) use ($groups) {
            $query->whereIn('roleable_id', $groups)->whereIn('role_id', array(3)); //@TODO: revisit this and come up with a better solution for getting user roles in array (3) - JT 11/12
        })->where('id', '!=', $this->id)->get();

        return $suggested;
    }

    public function siblings()
    {
        return false;
    }

    public function images()
    {
        return $this->morphMany('app\cmwn\Image', 'imageable');
    }

    public function hasRole(Array $roles)
    {
        foreach ($roles as $role) {
            if ($this->role->contains('title', $role)) {
                return true;
            }
        }

        return false;
    }

    public function updateMember($params)
    {
        if (isset($params['first_name'])) {
            $this->first_name = $params['first_name'];
        }

        if (isset($params['middle_name'])) {
            $this->middle_name = $params['middle_name'];
        }

        if (isset($params['last_name'])) {
            $this->last_name = $params['last_name'];
        }

        if (isset($params['gender'])) {
            $this->gender = $params['gender'];
        }

        if (isset($params['birthdate'])) {
            $this->dob = $params['birthdate'];
        }

        if ($this->save()) {
            return true;
        }

        return false;
    }

    public static function deleteMember($id)
    {
        $user = self::find($id);
        if (!$user->role()->detach()) { // TODO move to event listener.
            $user->delete();
        }

        if ($user) {
            return true;
        }

        return false;
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUuid($query, $val)
    {
        return $query->where('uuid', $val);
    }

    public function scopeName($query, $val)
    {
        return $query->where('name', $val);
    }

    public function updateImage($user_id, $params)
    {
        $user = self::find($user_id);
        $image = new Image();

        if (isset($params['url'])) {
            $image->url = $params['url'];
        }

        if (isset($params['cloudinary_id'])) {
            $image->cloudinary_id = $params['cloudinary_id'];
        }

        if ($user->images()->save($image)) {
            return true;
        }

        return false;
    }

    public function deleteImage($user_id)
    {
        $user = self::find($user_id);
        $image = new Image();
        if ($user->images()->delete()) {
            return true;
        }

        return false;
    }

    public function updatePassword($user, $newPassword)
    {
        return $user->fill([
            'password' => \Hash::make($newPassword)
        ])->save();
    }
}
