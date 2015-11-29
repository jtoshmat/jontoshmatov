<?php

namespace app\Transformer;

use app\District;
use League\Fractal\TransformerAbstract;

class MasterTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [];

    /**
     * Turn this item object into a generic array.
     *
     * @return array
     */
    public function transform( $sidebar)
    {
        return $sidebar;
    }
}
