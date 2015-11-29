<?php

namespace app\cmwn\Services;

class ImageManagement
{
    private static function setKey()
    {
        \Cloudinary::config(array(
            'cloud_name' => 'change-my-world-now',
            'api_key' => '125692255259728',
            'api_secret' => 'xTgojKXezGKFAd6v2aGQ_7mvmdM',
        ));
    }

    public static function uploader($file)
    {
        self::setKey();
        //return \Cloudinary\Uploader::upload($file);
        return \Cloudinary\Uploader::upload(
            $file,
            array(
                'public_id' => 'sample_id',
                'crop' => 'limit', 'width' => '50', 'height' => '50',
                'eager' => array(
                    array('width' => 200, 'height' => 200,
                        'crop' => 'thumb', 'gravity' => 'face',
                        'radius' => 20, 'effect' => 'sepia', ),
                    array('width' => 100, 'height' => 150,
                        'crop' => 'fit', 'format' => 'png', ),
                ),
                'tags' => array('special', 'for_homepage'),
            )
        );
    }
}
