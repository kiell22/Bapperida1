<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard/admin', 'AuthController::adminDashboard', ['filter' => 'auth']);
$routes->get('/dashboard/pegawai', 'AuthController::pegawaiDashboard', ['filter' => 'auth']);

$routes->get('/roles', 'RoleController::index');
$routes->get('/roles/create', 'RoleController::create');
$routes->post('/roles/store', 'RoleController::store');
$routes->get('/roles/edit/(:num)', 'RoleController::edit/$1');
$routes->post('/roles/update/(:num)', 'RoleController::update/$1');
$routes->get('/roles/delete/(:num)', 'RoleController::delete/$1');

$routes->get('/users', 'UserController::index');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');

$routes->get('/surat-masuk', 'SuratMasukController::index');
$routes->get('/surat-masuk/create', 'SuratMasukController::create');
$routes->post('/surat-masuk/store', 'SuratMasukController::store');
$routes->get('/surat-masuk/edit/(:num)', 'SuratMasukController::edit/$1');
$routes->post('/surat-masuk/update/(:num)', 'SuratMasukController::update/$1');
$routes->get('/surat-masuk/delete/(:num)', 'SuratMasukController::delete/$1');


$routes->get('/kategori-surat', 'KategoriSuratController::index');
$routes->get('/kategori-surat/create', 'KategoriSuratController::create');
$routes->post('/kategori-surat/store', 'KategoriSuratController::store');
$routes->get('/kategori-surat/edit/(:num)', 'KategoriSuratController::edit/$1');
$routes->post('/kategori-surat/update/(:num)', 'KategoriSuratController::update/$1');
$routes->get('/kategori-surat/delete/(:num)', 'KategoriSuratController::delete/$1');


$routes->get('/status-surat', 'StatusSuratController::index');
$routes->get('/status-surat/create', 'StatusSuratController::create');
$routes->post('/status-surat/store', 'StatusSuratController::store');
$routes->get('/status-surat/edit/(:num)', 'StatusSuratController::edit/$1');
$routes->post('/status-surat/update/(:num)', 'StatusSuratController::update/$1');
$routes->get('/status-surat/delete/(:num)', 'StatusSuratController::delete/$1');


$routes->get('/surat-keluar', 'SuratKeluarController::index');
$routes->get('/surat-keluar/create', 'SuratKeluarController::create');
$routes->post('/surat-keluar/store', 'SuratKeluarController::store');
$routes->get('/surat-keluar/edit/(:num)', 'SuratKeluarController::edit/$1');
$routes->post('/surat-keluar/update/(:num)', 'SuratKeluarController::update/$1');
$routes->get('/surat-keluar/delete/(:num)', 'SuratKeluarController::delete/$1');


$routes->get('/disposisi-surat', 'DisposisiSuratController::index');
$routes->get('/disposisi-surat/create', 'DisposisiSuratController::create');
$routes->post('/disposisi-surat/store', 'DisposisiSuratController::store');
$routes->get('/disposisi-surat/edit/(:num)', 'DisposisiSuratController::edit/$1');
$routes->post('/disposisi-surat/update/(:num)', 'DisposisiSuratController::update/$1');
$routes->get('/disposisi-surat/delete/(:num)', 'DisposisiSuratController::delete/$1');
