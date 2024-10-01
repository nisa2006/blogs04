<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BlogSite::index');
$routes->get('/home', 'BlogSite::index');
$routes->get('/about', 'BlogSite::about');
$routes->get('/blogs', 'BlogSite::blogs');
// ini adalah bagian form 
$routes->get('/create', 'BlogSite::create');
//insert data
$routes->post('/insert', 'BlogSite::insert');
//view blog user
$routes->get('/read/(:num)', 'BlogSite::read/$1');
$routes->get('/back', 'BlogSite::blogs');