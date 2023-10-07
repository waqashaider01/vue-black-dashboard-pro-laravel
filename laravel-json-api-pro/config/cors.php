<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => [
        'POST',
        'GET',
        'OPTIONS',
        'PUT',
        'PATCH',
        'DELETE',
    ],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => [
        'Content-Type',
        'X-Auth-Token',
        'Origin',
        'Authorization',
    ],

    'exposed_headers' => [
        'Cache-Control',
        'Content-Language',
        'Content-Type',
        'Expires',
        'Last-Modified',
        'Pragma',
    ],

    // 'max_age' => 0,
    'max_age' => 60 * 60 * 24,

    'supports_credentials' => false,

];
// return [

//     /*
//      * A cors profile determines which origins, methods, headers are allowed for
//      * a given requests. The `DefaultProfile` reads its configuration from this
//      * config file.
//      *
//      * You can easily create your own cors profile.
//      * More info: https://github.com/spatie/laravel-cors/#creating-your-own-cors-profile
//      */
//     'cors_profile' => Spatie\Cors\CorsProfile\DefaultProfile::class,

//     /*
//      * This configuration is used by `DefaultProfile`.
//      */
//     'default_profile' => [

//         'allow_credentials' => false,

//         'allow_origins' => [
//             '*',
//         ],

//         'allow_methods' => [
//             'POST',
//             'GET',
//             'OPTIONS',
//             'PUT',
//             'PATCH',
//             'DELETE',
//         ],

//         'allow_headers' => [
//             'Content-Type',
//             'X-Auth-Token',
//             'Origin',
//             'Authorization',
//         ],

//         'expose_headers' => [
//             'Cache-Control',
//             'Content-Language',
//             'Content-Type',
//             'Expires',
//             'Last-Modified',
//             'Pragma',
//         ],

//         'forbidden_response' => [
//             'message' => 'Forbidden (cors).',
//             'status' => 403,
//         ],

//         /*
//          * Preflight request will respond with value for the max age header.
//          */
//         'max_age' => 60 * 60 * 24,
//     ],
// ];
