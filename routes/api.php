<?php

use Dingo\Api\Routing\Router;

/** @var \Dingo\Api\Routing\Router $api */
$api = app(Router::class);

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

$api->version('v1', ['namespace' => '', 'middleware' => ['api']], function ($api) {

    /** @var \Dingo\Api\Routing\Router $api */
    // Public Routes
    $api->group(array('prefix' => 'manhole_cover', 'as' => 'manhole', 'namespace' => 'Manhole\Http\Controllers'), function ($api) {
        $api->get('health-check', 'ManholeController@hi')->name('hi');

    });

});
