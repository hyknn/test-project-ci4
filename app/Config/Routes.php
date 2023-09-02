<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'PageController::index');
$routes->get('/dashboard', 'PageController::index');
$routes->get('/profile', 'ProfileController::index');
$routes->get('/users', 'UsersController::index');
$routes->get('/employees', 'EmployeesController::index');

$routes->get('/sign-in', 'AuthController::index');
