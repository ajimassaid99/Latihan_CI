<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('auth/register', 'AuthController::register'); // Menampilkan halaman login
$routes->post('auth/register', 'AuthController::registerForm'); // Menampilkan halaman login
