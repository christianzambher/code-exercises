<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('upload', 'UploadController::index');
$routes->post('upload', 'UploadController::store');
$routes->get('files/(:any)', 'UploadController::show/$1');