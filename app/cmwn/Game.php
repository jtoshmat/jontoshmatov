<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use app\cmwn\Traits\RoleTrait;

class Game extends Model
{
    use RoleTrait;
    use SoftDeletes;
    protected $table = 'games';

    public static $gameUpdateRules = array(
        'title' => 'required | string',
        //'role[]'=>'required',
        //'role[]'=>'required|regex:/^[0-9]?$/',
    );

    public function flips()
    {
        return $this->belongsToMany('app\Game', 'game_flips', 'game_id', 'flip_id');
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
