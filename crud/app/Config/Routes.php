<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->add('/user/add', 'User::add');
$routes->add('/user/edit/(:any)', 'User::edit/$1');
$routes->add('/user/delete/(:any)', 'User::delete/$1');
$routes->add('/user/restore/(:any)', 'User::restore/$1');
