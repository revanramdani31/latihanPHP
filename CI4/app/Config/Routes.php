<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'dosen::display');
$routes->get('/', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('home', 'Home::index');
$routes->get('berita', 'Berita::index');
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa/tambah', 'Mahasiswa::tambah');
$routes->post('/mahasiswa/simpan', 'Mahasiswa::simpan');
$routes->get('/mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('/mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->get('/mahasiswa/detail/(:num)', 'Mahasiswa::detail/$1');