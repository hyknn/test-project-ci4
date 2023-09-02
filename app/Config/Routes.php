<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

service('auth')->routes($routes, ['except' => ['logout', 'login']]);

// Login
$routes->get('/login', '\CodeIgniter\Shield\Controllers\LoginController::loginView');
$routes->post('/login', 'LoginController::customLoginAction');

$routes->get('/logout', 'LoginController::customLogoutAction');

$routes->get('/', 'PageController::index');
$routes->get('/dashboard', 'PageController::index');
$routes->get('/profile', 'ProfileController::index');

// Users
$routes->group('user', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('create', 'UserController::create');
    $routes->post('store', 'UserController::store');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->post('update/(:num)', 'UserController::update/$1');
    $routes->get('delete/(:num)', 'UserController::delete/$1');
});

// Employee
$routes->group('employees', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'EmployeesController::index');
    $routes->get('create', 'EmployeesController::create');
    $routes->post('store', 'EmployeesController::store');
    $routes->get('edit/(:num)', 'EmployeesController::edit/$1');
    $routes->post('update/(:num)', 'EmployeesController::update/$1');
    $routes->get('delete/(:num)', 'EmployeesController::delete/$1');
});
