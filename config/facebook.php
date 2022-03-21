<?php

return [
    'config' => [
        'app_id' => env('FACEBOOK_APP_ID', null),
        'app_secret' => env('FACEBOOK_APP_SECRET', null),
        'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', 'v2.8'),
        'access_token' => env('ACCESS_TOKEN', null),
    ],
];
