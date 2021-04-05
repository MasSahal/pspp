<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/admin', 'Login::login_admin');
$routes->get('/admin', 'Login::login_admin');
$routes->post('/siswa/auth-siswa', 'Login::auth_siswa');
$routes->post('/admin/auth-admin', 'Login::auth_admin');

// $routes->get('/admin', 'Admin::index', ['filter' => 'auth']);

$routes->group('admin', function ($routes) {
	$routes->get('home', 'Admin::index');
	$routes->get('logout', 'Login::logout');


	//bayar spp
	$routes->get('pembayaran', 'Admin::pembayaran');
	$routes->get("pembayaran/(:num)/detail", "Admin::detail_spp/$1");
	$routes->post("entri-spp/bayar-spp", "Admin::bayar_spp/$1");
	$routes->get("print/(:num)/(:num)", "Admin::print_spp/$1/$2");
	// $routes->get('cari-siswa', 'Admin::cari_siswa');


	// siswa
	$routes->get('siswa', 'Admin::siswa');
	$routes->post('siswa/insert', 'Admin::insert_siswa');
	$routes->post('siswa/edit', 'Admin::edit_siswa');
	$routes->get('siswa/(:num)/delete', 'Admin::delete_siswa/$1');


	//admin dan petugas
	$routes->get('administrator', 'Admin::data_admin');
	$routes->post('administrator/insert', 'Admin::insert_admin');
	$routes->post('administrator/edit', 'Admin::edit_admin');
	$routes->get('administrator/(:num)/delete', 'Admin::delete_admin/$1');

	// kelas
	$routes->get('kelas', 'Admin::kelas');
	$routes->post('kelas/insert', 'Admin::insert_kelas');
	$routes->post('kelas/edit', 'Admin::edit_kelas');
	$routes->get('kelas/(:num)/delete', 'Admin::delete_kelas/$1');

	// entri spp
	$routes->get('entri-spp', 'Admin::entri_spp');
	$routes->post('entri-spp/insert', 'Admin::insert_entri_spp');
	$routes->post('entri-spp/edit', 'Admin::edit_entri_spp');
	$routes->get('entri-spp/(:num)/delete', 'Admin::delete_entri_spp/$1');
});


//routes siswa
$routes->group('siswa', function ($routes) {
	$routes->get('home', 'Login::home_siswa');
	$routes->get('logout', 'Login::logout');
});


//routes petugas/admin
$routes->group('petugas', function ($routes) {
	$routes->get('home', 'Login::home_petugas');
	$routes->get('logout', 'Login::logout');

	//pembayaran
	$routes->get('pembayaran', 'Login::pembayaran');
	$routes->get("pembayaran/(:num)/detail", "Login::detail_spp/$1");
	$routes->get("print/(:num)/(:num)", "Login::print_spp/$1/$2");
	$routes->post("entri-spp/bayar-spp", "Admin::bayar_spp");
});










/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
