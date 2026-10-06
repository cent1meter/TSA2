<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('profile', 'Pages::profile');
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');

$routes->get('tasks', 'Tasks::index');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->post('logout', 'Auth::logout', ['filter' => 'auth']);

$routes->group('tasks', ['filter' => 'auth'], static function (RouteCollection $routes): void {
    $routes->get('new', 'Tasks::new');
    $routes->post('create', 'Tasks::create');
    $routes->get('(:num)/edit', 'Tasks::edit/$1');
    $routes->post('(:num)/update', 'Tasks::update/$1');
    $routes->post('(:num)/delete', 'Tasks::delete/$1');
});
