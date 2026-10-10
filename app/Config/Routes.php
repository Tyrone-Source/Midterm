<?php
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->resource('products', ['controller' => 'ProductController']);
    $routes->resource('customers', ['controller' => 'CustomerController']);
    $routes->resource('staff', ['controller' => 'StaffController']);
    
    $routes->get('sales/record', 'SaleController::record');
    $routes->post('sales/record', 'SaleController::store');
    $routes->get('sales/history', 'SaleController::history');
});