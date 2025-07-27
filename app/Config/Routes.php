<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Buku (CRUD)
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create');
$routes->post('/buku/store', 'Buku::store');
$routes->get('/buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('/buku/update/(:num)', 'Buku::update/$1');
$routes->get('/buku/delete/(:num)', 'Buku::delete/$1');

// Auth
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('auth/logout', 'Auth::logout');