<?php

namespace app\cmwn;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use app\cmwn\Traits\RoleTrait;

class Image extends Model
{
    use RoleTrait;

    protected $table = 'images';

    public static $imageUpdateRules = array(
        'url' => 'string',
        //'role[]'=>'required',
        //'role[]'=>'required|regex:/^[0-9]?$/',
    );

    public function imageabless()
    {
        return $this->morphTo();
    }

}
