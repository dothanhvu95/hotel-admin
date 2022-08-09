<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',
    'size' => [
        'hotel_images' => [
            'fhd' => [
                'width' => 1920,
                'height' => 1080,
                'suffix' => 'f'
            ],
            'large' => [
                'width' => 800,
                'height' => 800,
                'suffix' => 'l'
            ],
            'medium' => [
                'width' => 400,
                'height' => 400,
                'suffix' => 'm'
            ],
            'small' => [
                'width' => 160,
                'height' => 160,
                'suffix' => 's'
            ]
        ]
    ],
];