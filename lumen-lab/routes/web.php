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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/ping', function () use ($app) {
    $mongo = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
    $query = new MongoDB\Driver\Query(['name' => 'pong']);
    $rows = $mongo->executeQuery('yann.yuntao', $query);
    foreach($rows as $r){
       echo $r->name;
    }
    die;
});
