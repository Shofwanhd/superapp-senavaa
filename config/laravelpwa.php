<?php

return [
    'name' => 'SuperApp',
    'manifest' => [
        'name' => 'SuperApp',
        'short_name' => 'SuperApp',
        'start_url' => '/',
        'display' => 'standalone',
        'theme_color' => '#007aff',
        'background_color' => '#ffffff',
        'orientation'=> 'portrait',
        'icons' => [
            '192' => [
                'path' => '/images/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '512' => [
                'path' => '/images/icons/icon-512x512.png',
                'purpose' => 'any'
            ]
        ],
    ]
];
