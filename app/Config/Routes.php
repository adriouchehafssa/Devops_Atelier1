<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('article/add', 'ArticleController::add');
$routes->get('article/all', 'ArticleController::all');
$routes->post('article/update/(:num)', 'ArticleController::update/$1');
$routes->get('article/delete/(:num)', 'ArticleController::delete/$1');
