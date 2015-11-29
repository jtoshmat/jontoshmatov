<?php

namespace app\Transformer;

use app\cmwn\Image;
use app\Organization;
use League\Fractal\TransformerAbstract;

class ImageTransformer extends TransformerAbstract
{

    /**
     * Turn this item object into a generic array.
     *
     * @return array
     */
    public function transform(Image $image)
    {
        return [
            'cloudinary_id'          => $image->cloudinary_id,
            'url'                    => $image->url,
            'created_at'             => (string) $image->created_at,
        ];
    }
}
