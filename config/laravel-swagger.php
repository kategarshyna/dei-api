<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Basic Info
    |--------------------------------------------------------------------------
    |
    | The basic info for the application such as the title description,
    | description, version, etc...
    |
    */

    'title' => env('APP_NAME'),

    'description' => '',

    'appVersion' => '1.0.0',

    'host' => parse_url(env('APP_URL'), PHP_URL_HOST),

    'basePath' => '/',

    'schemes' => [
        'http',
        // 'https',
    ],

    'consumes' => [
        'application/json',
    ],

    'produces' => [
        'application/json',
    ],

    /*
    |--------------------------------------------------------------------------
    | Ignore methods
    |--------------------------------------------------------------------------
    |
    | Methods in the following array will be ignored in the paths array
    |
    */

    'ignoredMethods' => [
        'head',
    ],
];
