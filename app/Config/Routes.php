<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');







// Rotas POST
$routes->post('/send', 'Home::insertUser');

$routes->add('/delete/(:num)', 'Home::deleteUser/$1');
