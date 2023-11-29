<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//AUTH
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');



//Barang
$routes->get('/barang','BarangController::index');
$routes->get('/barang/create','BarangController::createview');
$routes->get('/barang/edit/(:any)','BarangController::editview/$1');
$routes->post('/barang/createsave','BarangController::createsave');
$routes->post('/barang/editsave','BarangController::editsave');
$routes->post('/barang/delete','BarangController::delete');
$routes->post('/barang/autofill','BarangController::autofill');

//Suplier
$routes->get('/suplier','SuplierController::index');
$routes->get('/suplier/create','SuplierController::createview');
$routes->get('/suplier/edit/(:any)','SuplierController::editview/$1');
$routes->post('/suplier/createsave','SuplierController::createsave');
$routes->post('/suplier/editsave','SuplierController::editsave');
$routes->post('/suplier/delete','SuplierController::delete');


//Pembelian
$routes->get('/pembelian','PembelianController::index');
$routes->get('/pembelian/create','PembelianController::createview');
$routes->get('/pembelian/edit/(:any)','PembelianController::editview/$1');
$routes->get('/pembelian/detail/(:any)','PembelianController::detailview/$1');
$routes->post('/pembelian/createsave','PembelianController::createsave');
$routes->post('/pembelian/editsave','PembelianController::editsave');
$routes->post('/pembelian/delete','PembelianController::delete');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
