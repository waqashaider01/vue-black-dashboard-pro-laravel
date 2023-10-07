<?php

use Illuminate\Support\Facades\Route;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api\V1\Auth')->prefix('api/v1')->middleware('json.api')->group(function () {
    Route::post('/login', 'LoginController');
    Route::post('/register', 'RegisterController');
    Route::post('/logout', 'LogoutController')->middleware('auth:api');
    Route::post('/password-forgot', 'ForgotPasswordController');
    Route::post('/password-reset', 'ResetPasswordController');
});

Route::namespace('Api\V1')->prefix('api/v1')->middleware('auth:api')->group(function () {
    Route::post('/uploads/{resource}/{id}/{field}', 'UploadController')->where('path', '.*');
});

JsonApi::register('v1')->middleware('auth:api')->routes(function ($api) {
    $api->get('me', 'Api\V1\MeController@readProfile');
    $api->patch('me', 'Api\V1\MeController@updateProfile');

    $api->resource('users', [
        'has-one' => 'roles'
    ]);
    $api->resource('roles', [
        'has-many' => 'permissions'
    ]);
    $api->resource('permissions', [
        'has-one' => 'roles'
    ])->only('index');

    $api->resource('categories');
    $api->resource('tags');
    $api->resource('items', [
        'has-one' => 'user',
        'has-one' => 'category',
        'has-many' => 'tags'
    ]);
});
