<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', ['filter' => 'auth'], function($routes) {
    $routes->resource('users', ['controller' => 'Api\UserController']);
});
