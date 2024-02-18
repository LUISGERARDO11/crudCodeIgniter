<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('listar', 'Productos::index');
$routes->get('crear', 'Productos::crear');
$routes->post('guardar', 'Productos::guardar');
$routes->get('borrar/(:num)', 'Productos::borrar/$1');
$routes->get('editar/(:num)', 'Productos::editar/$1');
$routes->post('actualizar', 'Productos::actualizar');