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
$routes->get('/create', 'BlogSite::create',['filter'=>'login']);
//insert data
$routes->post('/insert', 'BlogSite::insert');
//view blog user
$routes->get('/read/(:num)', 'BlogSite::read/$1');
$routes->get('/back', 'BlogSite::blogs');

// login
$routes->get('/login/register2', 'Login::Userlogin');
// sigin jika sudah daftar
$routes->get('/confirm', 'Login::sigin');
//$routes->get('/sigin', 'Login::sigin');
//ambil data user 
$routes->post('/Daftar', 'Login::getdata');
//ambil log user 
$routes->post('/get_user_login', 'Login::get_sigin');

//view admin jika user sudah daftar /sigin
$routes->get('/ViewAdmin', 'Login::ViewAdmin');
//logout
$routes->get('/Logout', 'Login::logout');
$routes->get('/sigin', 'login::sigin');