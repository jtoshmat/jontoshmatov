<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use app\cmwn\Traits\RoleTrait;

class Flip extends Model
{
    use RoleTrait;
    use SoftDeletes;
    protected $table = 'flips';

    public static $flipUpdateRules = array(
        'title' => 'required | string',
        //'role[]'=>'required',
        //'role[]'=>'required|regex:/^[0-9]?$/',
    );

    public function games()
    {
        return $this->belongsToMany('app\Flip', 'game_flips', 'game_id', 'flip_id');
    }

    public function users()
    {
        return $this->belongsToMany('app\User');
    }

    public function updateParameters($parameters)
    {
        if (isset($parameters['title'])) {
            $this->title = $parameters['title'];
        }

        if (isset($parameters['description'])) {
            $this->description = $parameters['description'];
        }

        return $this->save();
    }

}
