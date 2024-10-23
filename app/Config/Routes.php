<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mobil', 'Mobil::index');
$routes->post('/mobil/tambah', 'Mobil::sendData');
$routes->get('/mobil/edit/(:num)', 'Mobil::edit/$1');
$routes->post('/mobil/update', 'Mobil::editMobil');
$routes->get('/mobil/hapus/(:num)', 'Mobil::hapus/$1');

