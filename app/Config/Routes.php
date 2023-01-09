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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->resource('/Data-out', ['controller' => 'SparepartKeluar::data']);
$routes->get('/Dashboard', 'Home::dashboard');

/*
* --------------------------------------------------------------------
 * Routes Login
 * --------------------------------------------------------------------
 */
$routes->post('cek_login', 'Auth::cek_login');
$routes->get('V_login', 'Auth::index');
$routes->get('logout', 'Auth::logout');

/*
* --------------------------------------------------------------------
 * Routes Users
 * --------------------------------------------------------------------
 */
$routes->get('/Users', 'Users::index');
$routes->post('Add-users', 'Users::insert');
$routes->post('/Users/update/(:num)', 'Users::update/$1');
$routes->get('/Users/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-users/(:num)', 'Users::EditAction/$1');
$routes->delete('/Users/Delete/(:num)', 'Users::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes Data Sparepart Masuk
 * --------------------------------------------------------------------
 */
$routes->resource('api/home', ['controller' => 'Api\in']);
$routes->get('/Data-in', 'Sparepart::in');
$routes->post('Add', 'Sparepart::insert');
$routes->delete('/delete/(:num)', 'Sparepart::deleteData/$1');
$routes->post('/Data-in/detail/(:num)', 'Sparepart::getDetail/$1');
$routes->post('/Data-in/update/(:num)', 'Sparepart::update/$1');
$routes->get('/Data-in/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-in/(:num)', 'Sparepart::EditAction/$1');
$routes->get('/Data-in/detail/(:num)', 'Home::index');
/*
* --------------------------------------------------------------------
 * Routes Data Report Sparepart Incoming
 * --------------------------------------------------------------------
 */

$routes->get('/Report-incoming', 'Inventory::index');
$routes->post('Report-search', 'Inventory::show');
$routes->get('Report-search', 'Auth::index');
$routes->get('Report-Search', 'Auth::index');
$routes->post('Report-Search', 'Inventory::tampil');
$routes->get('print-in/(:any)', 'Inventory::excel/$1');
$routes->get('print-out/(:any)', 'Inventory::excels/$1');
$routes->get('Report/print//', 'Inventory::alert');
$routes->get('Report/Print//', 'Inventory::alert');
$routes->get('print-out//', 'Inventory::alert');
$routes->get('print-in//', 'Inventory::alert');
$routes->get('Report/print/(:any)', 'Inventory::print/$1');
$routes->get('Report/Print/(:any)', 'Inventory::prints/$1');
$routes->get('/Report-outgoing', 'Inventory::out');

/*
* --------------------------------------------------------------------
 * Routes Data Sparepart Keluar
 * --------------------------------------------------------------------
 */

$routes->get('/Data-out', 'SparepartKeluar::index');
$routes->post('Out', 'SparepartKeluar::insert');
$routes->delete('/Data-out/Delete/(:num)', 'SparepartKeluar::deleteData/$1');
$routes->post('/Data-out/detail/(:num)', 'SparepartKeluar::getDetail/$1');
$routes->post('/Data-out/update/(:num)', 'SparepartKeluar::update/$1');
$routes->get('/Data-out/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-out/(:num)', 'SparepartKeluar::EditAction/$1');
$routes->get('/Inventory/detail/(:num)', 'Home::index');


/*
* --------------------------------------------------------------------
 * Routes List Sparepart 
 * --------------------------------------------------------------------
 */
$routes->get('/Sparepart', 'ListData\ListSparepart::index');
$routes->post('Add-sparepart', 'ListData\ListSparepart::insert');
$routes->post('/Sparepart/update/(:num)', 'ListData\ListSparepart::update/$1');
$routes->get('/Sparepart/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-sparepart/(:num)', 'ListData\ListSparepart::EditAction/$1');
$routes->delete('/Sparepart/Delete/(:num)', 'ListData\ListSparepart::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List Location
 * --------------------------------------------------------------------
 */

$routes->get('/Location', 'ListData\Location::index');
$routes->post('Add-location', 'ListData\Location::insert');
$routes->post('/Location/update/(:num)', 'ListData\Location::update/$1');
$routes->get('/Location/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-location/(:num)', 'ListData\Location::EditAction/$1');
$routes->delete('/Location/Delete/(:num)', 'ListData\Location::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List Oum
 * --------------------------------------------------------------------
 */

$routes->get('/Oum', 'ListData\Oum::index');
$routes->post('Add-oum', 'ListData\Oum::insert');
$routes->post('/Oum/update/(:num)', 'ListData\Oum::update/$1');
$routes->get('/Oum/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-oum/(:num)', 'ListData\Oum::EditAction/$1');
$routes->delete('/Oum/Delete/(:num)', 'ListData\Oum::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List Orders
 * --------------------------------------------------------------------
 */

$routes->get('/Orders', 'ListData\Orders::index');
$routes->post('Add-orders', 'ListData\Orders::insert');
$routes->post('/Orders/update/(:num)', 'ListData\Orders::update/$1');
$routes->get('/Orders/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-orders/(:num)', 'ListData\Orders::EditAction/$1');
$routes->delete('/Orders/Delete/(:num)', 'ListData\Orders::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List Condition
 * --------------------------------------------------------------------
 */

$routes->get('/Conditions', 'ListData\Conditions::index');
$routes->post('Add-conditions', 'ListData\Conditions::insert');
$routes->post('/Conditions/update/(:num)', 'ListData\Conditions::update/$1');
$routes->get('/Conditions/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-conditions/(:num)', 'ListData\Conditions::EditAction/$1');
$routes->delete('/Conditions/Delete/(:num)', 'ListData\Conditions::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List A C Regist
 * --------------------------------------------------------------------
 */

$routes->get('/Acregist', 'ListData\Acreg::index');
$routes->post('Add-acreg', 'ListData\Acreg::insert');
$routes->post('/Acregist/update/(:num)', 'ListData\Acreg::update/$1');
$routes->get('/Acregist/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-acreg/(:num)', 'ListData\Acreg::EditAction/$1');
$routes->delete('/Acreg/Delete/(:num)', 'ListData\Acreg::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List Givento
 * --------------------------------------------------------------------
 */

$routes->get('/Givento', 'ListData\Given::index');
$routes->post('Add-givento', 'ListData\Given::insert');
$routes->post('/Givento/update/(:num)', 'ListData\Given::update/$1');
$routes->get('/Givento/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-givento/(:num)', 'ListData\Given::EditAction/$1');
$routes->delete('/Givento/Delete/(:num)', 'ListData\Given::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes List Serviceable
 * --------------------------------------------------------------------
 */

$routes->get('/Serviceable', 'SpareCondition\Serviceable::index');
$routes->post('Serviceable-search', 'SpareCondition\Serviceable::show');
$routes->get('Serviceable-search', 'Auth::index');
$routes->get('Serviceable/Print/(:any)', 'SpareCondition\Serviceable::excel/$1');
$routes->get('Serviceable/print//', 'Inventory::alert');
$routes->get('Serviceable/Print//', 'Inventory::alert');
$routes->get('Serviceable/print/(:any)', 'SpareCondition\Serviceable::print/$1');

/*
* --------------------------------------------------------------------
 * Routes List Unserviceable
 * --------------------------------------------------------------------
 */

$routes->get('/Unserviceable', 'SpareCondition\Unserviceable::index');
$routes->post('Unserviceable-search', 'SpareCondition\Unserviceable::show');
$routes->get('Unserviceable-search', 'Auth::index');
$routes->get('Unserviceable/Print/(:any)', 'SpareCondition\Unserviceable::excel/$1');
$routes->get('Unserviceable/print//', 'Inventory::alert');
$routes->get('Unserviceable/Print//', 'Inventory::alert');
$routes->get('Unserviceable/print/(:any)', 'SpareCondition\Unserviceable::print/$1');


/*
* --------------------------------------------------------------------
 * Routes List Flameable
 * --------------------------------------------------------------------
 */

$routes->get('/Flameable', 'SpareCondition\Flameable::index');
$routes->post('Flameable-search', 'SpareCondition\Flameable::show');
$routes->get('Flameable-search', 'Auth::index');
$routes->get('Flameable/Print/(:any)', 'SpareCondition\Flameable::excel/$1');
$routes->get('Flameable/print//', 'Inventory::alert');
$routes->get('Flameable/Print//', 'Inventory::alert');
$routes->get('Flameable/print/(:any)', 'SpareCondition\Flameable::print/$1');

/*
* --------------------------------------------------------------------
 * Routes List New
 * --------------------------------------------------------------------
 */

$routes->get('/New', 'SpareCondition\NewCondition::index');
$routes->post('New-search', 'SpareCondition\NewCondition::show');
$routes->get('New-search', 'Auth::index');
$routes->get('New/Print/(:any)', 'SpareCondition\NewCondition::excel/$1');
$routes->get('New/print//', 'Inventory::alert');
$routes->get('New/Print//', 'Inventory::alert');
$routes->get('New/print/(:any)', 'SpareCondition\NewCondition::print/$1');


/*
* --------------------------------------------------------------------
 * Routes List Inspected
 * --------------------------------------------------------------------
 */

$routes->get('/Inspected', 'SpareCondition\Inspected::index');
$routes->post('Inspected-search', 'SpareCondition\Inspected::show');
$routes->get('Inspected-search', 'Auth::index');
$routes->get('Inspected/Print/(:any)', 'SpareCondition\Inspected::excel/$1');
$routes->get('Inspected/print//', 'Inventory::alert');
$routes->get('Inspected/Print//', 'Inventory::alert');
$routes->get('Inspected/print/(:any)', 'SpareCondition\Inspected::print/$1');


/*
* --------------------------------------------------------------------
 * Routes List Repair
 * --------------------------------------------------------------------
 */

$routes->get('/Repair', 'SpareCondition\Repair::index');
$routes->post('Repair-search', 'SpareCondition\Repair::show');
$routes->get('Repair-search', 'Auth::index');
$routes->get('Repair/Print/(:any)', 'SpareCondition\Repair::excel/$1');
$routes->get('Repair/print//', 'Inventory::alert');
$routes->get('Repair/Print//', 'Inventory::alert');
$routes->get('Repair/print/(:any)', 'SpareCondition\Repair::print/$1');

/*
* --------------------------------------------------------------------
 * Routes List Overhauled
 * --------------------------------------------------------------------
 */

$routes->get('/Overhauled', 'SpareCondition\Overhauled::index');
$routes->post('Overhauled-search', 'SpareCondition\Overhauled::show');
$routes->get('Overhauled-search', 'Auth::index');
$routes->get('Overhauled/Print/(:any)', 'SpareCondition\Overhauled::excel/$1');
$routes->get('Overhauled/print//', 'Inventory::alert');
$routes->get('Overhauled/Print//', 'Inventory::alert');
$routes->get('Overhauled/print/(:any)', 'SpareCondition\Overhauled::print/$1');

/*
* --------------------------------------------------------------------
 * Routes List N/W
 * --------------------------------------------------------------------
 */

$routes->get('/N_W', 'SpareCondition\NW::index');
$routes->post('N_W-search', 'SpareCondition\NW::show');
$routes->get('N_W-search', 'Auth::index');
$routes->get('N_W/Print/(:any)', 'SpareCondition\NW::excel/$1');
$routes->get('N_W/print//', 'Inventory::alert');
$routes->get('N_W/Print//', 'Inventory::alert');
$routes->get('N_W/print/(:any)', 'SpareCondition\NW::print/$1');


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
