<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/fb-test-creds', function () use ($app) {
    return file_get_contents($app->resourcePath('views/fb-test-creds.html'));
});

$app->post('facebook/login', 'Controller@facebookLogin');