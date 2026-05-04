<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('lang/(:segment)', function ($lang) {
    session()->set('lang', $lang);
    return redirect()->back();
});

$routes->group('users', function ($routes) {
    $routes->get('/', 'UserController::index');
});

$routes->get('users/delete/(:num)', 'UserController::delete/$1');
