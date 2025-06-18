<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/masalembu', 'Home::masalembu');
$routes->get('home/dashboard', 'Home::dashboard');
$routes->get('home/destinasi_wisata', 'Home::destinasi_wisata');
$routes->get('detail/(:num)', 'Home::detail_artikel/$1');
$routes->get('home/kontak', 'Home::kontak');
$routes->get('home/about', 'Home::about');








