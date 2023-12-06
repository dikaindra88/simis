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
$routes->get('/Login-personnel', 'Home::personnel');
// $routes->resource('/Data-out', ['controller' => 'SparepartKeluar::data']);
$routes->get('/Dashboard', 'Home::dashboard');
$routes->get('/Dashboard-personnel', 'Home::dashboard_personnel');

/*
* --------------------------------------------------------------------
 * Routes Login
 * --------------------------------------------------------------------
 */
$routes->post('cek_login', 'Auth::cek_login');
$routes->post('cek_login1', 'Auth::cek_login1');
$routes->get('V_login', 'Auth::index');
$routes->get('logout', 'Auth::logout');
$routes->get('logout2', 'Auth::logout2');

/*
* --------------------------------------------------------------------
 * Routes Request
 * --------------------------------------------------------------------
 */

$routes->get('/Request-sparepart', 'Request::index');
$routes->post('/Request-sparepart/update/(:num)', 'Request::update/$1');
$routes->get('/Request-sparepart/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-request/(:num)', 'Request::editData/$1');
$routes->post('Add-request', 'Request::insert');
$routes->post('/Dashboard-personnel/update-request/(:num)', 'Request::update2/$1');
$routes->get('/Dashboard-personnel/update-request/(:num)', 'Home::index/$1');
$routes->post('/Edit-request-personnel/(:num)', 'Request::EditAction/$1');


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
$routes->post('Report-Search', 'Inventory::tampil');
$routes->post('Reports-Search', 'Inventory::shows');
$routes->get('Report-search', 'Auth::index');
$routes->get('Report-Search', 'Auth::index');
$routes->get('print-in/(:any)/(:any)', 'Inventory::excel/$1/$2');
$routes->get('print-out/(:any)/(:any)', 'Inventory::excels/$1/$2');
$routes->get('print-stock', 'Inventory::stocks');
$routes->get('Report/print//', 'Inventory::alert');
$routes->get('Report/Print//', 'Inventory::alert');
$routes->get('print-out//', 'Inventory::alert');
$routes->get('print-in//', 'Inventory::alert');
$routes->get('Report/print/(:any)/(:any)', 'Inventory::print/$1/$2');
$routes->get('Report/Print/(:any)/(:any)', 'Inventory::prints/$1/$2');
$routes->get('Report/Prints', 'Inventory::pdf');
$routes->get('/Report-outgoing', 'Inventory::out');
$routes->get('/Report-stock', 'Inventory::stock');

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

$routes->get('/Rack', 'ListData\Location::index');
$routes->post('Add-location', 'ListData\Location::insert');
$routes->post('/Rack/update/(:num)', 'ListData\Location::update/$1');
$routes->get('/Rack/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-location/(:num)', 'ListData\Location::EditAction/$1');
$routes->delete('/Rack/Delete/(:num)', 'ListData\Location::deleteData/$1');

/*
* --------------------------------------------------------------------
 * Routes List Oum
 * --------------------------------------------------------------------
 */

$routes->get('/Satuan', 'ListData\Oum::index');
$routes->post('Add-oum', 'ListData\Oum::insert');
$routes->post('/Satuan/update/(:num)', 'ListData\Oum::update/$1');
$routes->get('/Satuan/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-oum/(:num)', 'ListData\Oum::EditAction/$1');
$routes->delete('/Satuan/Delete/(:num)', 'ListData\Oum::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes List Condition
 * --------------------------------------------------------------------
 */

$routes->get('/Kondisi', 'ListData\Conditions::index');
$routes->post('Add-conditions', 'ListData\Conditions::insert');
$routes->post('/Kondisi/update/(:num)', 'ListData\Conditions::update/$1');
$routes->get('/Kondisi/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-conditions/(:num)', 'ListData\Conditions::EditAction/$1');
$routes->delete('/Kondisi/Delete/(:num)', 'ListData\Conditions::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes List personnel
 * --------------------------------------------------------------------
 */

$routes->get('/Personnel', 'ListData\Given::index');
$routes->post('Add-givento', 'ListData\Given::insert');
$routes->post('/Personnel/update/(:num)', 'ListData\Given::update/$1');
$routes->get('/Personnel/update/(:num)', 'Home::index/$1');
$routes->post('/Edit-givento/(:num)', 'ListData\Given::EditAction/$1');
$routes->delete('/Personnel/Delete/(:num)', 'ListData\Given::deleteData/$1');


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
 * Routes Manual
 * --------------------------------------------------------------------
 */
$routes->get('/Manual', 'Manual::index');
$routes->post('Manual-add', 'Manual::insert');
$routes->post('/Manual/update/(:num)', 'Manual::update/$1');
$routes->post('/Manual/pdf/(:num)', 'Manual::getPdf/$1');
$routes->get('/Manual/pdf/(:num)', 'Auth::index');
$routes->get('/Manual/pdf/(:num)', 'Auth::index');
$routes->get('/Manual/Convert', 'Manual::Convert');
$routes->get('/Manual/Print', 'Manual::Print');
$routes->get('/Manual/update/(:num)', 'Auth::index');
$routes->post('/Edit-Manual/(:num)', 'Manual::EditAction/$1');
$routes->delete('/Manual/Delete/(:num)', 'Manual::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes PK-YGR
 * --------------------------------------------------------------------
 */
$routes->get('/PK-YGR', 'DocOnboard\PKYGR::index');
$routes->post('PK-YGR-add', 'DocOnboard\PKYGR::insert');
$routes->post('/PK-YGR/update/(:num)', 'DocOnboard\PKYGR::update/$1');
$routes->post('/PK-YGR/pdf/(:num)', 'DocOnboard\PKYGR::getPdf/$1');
$routes->get('/PK-YGR/pdf/(:num)', 'Auth::index');
$routes->get('/PK-YGR/pdf/(:num)', 'Auth::index');
$routes->get('/PK-YGR/Convert', 'DocOnboard\PKYGR::Convert');
$routes->get('/PK-YGR/Print', 'DocOnboard\PKYGR::Print');
$routes->get('/PK-YGR/update/(:num)', 'Auth::index');
$routes->post('/Edit-PK-YGR/(:num)', 'DocOnboard\PKYGR::EditAction/$1');
$routes->delete('/PK-YGR/Delete/(:num)', 'DocOnboard\PKYGR::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes PK-YGK
 * --------------------------------------------------------------------
 */
$routes->get('/PK-YGK', 'DocOnboard\PKYGK::index');
$routes->post('PK-YGK-add', 'DocOnboard\PKYGK::insert');
$routes->post('/PK-YGK/update/(:num)', 'DocOnboard\PKYGK::update/$1');
$routes->post('/PK-YGK/pdf/(:num)', 'DocOnboard\PKYGK::getPdf/$1');
$routes->get('/PK-YGK/pdf/(:num)', 'Auth::index');
$routes->get('/PK-YGK/pdf/(:num)', 'Auth::index');
$routes->get('/PK-YGK/Convert', 'DocOnboard\PKYGK::Convert');
$routes->get('/PK-YGK/Print', 'DocOnboard\PKYGK::Print');
$routes->get('/PK-YGK/update/(:num)', 'Auth::index');
$routes->post('/Edit-PK-YGK/(:num)', 'DocOnboard\PKYGK::EditAction/$1');
$routes->delete('/PK-YGK/Delete/(:num)', 'DocOnboard\PKYGK::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes PK-RDA
 * --------------------------------------------------------------------
 */
$routes->get('/PK-RDA', 'DocOnboard\PKRDA::index');
$routes->post('PK-RDA-add', 'DocOnboard\PKRDA::insert');
$routes->post('/PK-RDA/update/(:num)', 'DocOnboard\PKRDA::update/$1');
$routes->post('/PK-RDA/pdf/(:num)', 'DocOnboard\PKRDA::getPdf/$1');
$routes->get('/PK-RDA/pdf/(:num)', 'Auth::index');
$routes->get('/PK-RDA/pdf/(:num)', 'Auth::index');
$routes->get('/PK-RDA/Convert', 'DocOnboard\PKRDA::Convert');
$routes->get('/PK-RDA/Print', 'DocOnboard\PKRDA::Print');
$routes->get('/PK-RDA/update/(:num)', 'Auth::index');
$routes->post('/Edit-PK-RDA/(:num)', 'DocOnboard\PKRDA::EditAction/$1');
$routes->delete('/PK-RDA/Delete/(:num)', 'DocOnboard\PKRDA::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes PK-RDA
 * --------------------------------------------------------------------
 */
$routes->get('/PK-RDG', 'DocOnboard\PKRDG::index');
$routes->post('PK-RDG-add', 'DocOnboard\PKRDG::insert');
$routes->post('/PK-RDG/update/(:num)', 'DocOnboard\PKRDG::update/$1');
$routes->post('/PK-RDG/pdf/(:num)', 'DocOnboard\PKRDG::getPdf/$1');
$routes->get('/PK-RDG/pdf/(:num)', 'Auth::index');
$routes->get('/PK-RDG/pdf/(:num)', 'Auth::index');
$routes->get('/PK-RDG/Convert', 'DocOnboard\PKRDG::Convert');
$routes->get('/PK-RDG/Print', 'DocOnboard\PKRDG::Print');
$routes->get('/PK-RDG/update/(:num)', 'Auth::index');
$routes->post('/Edit-PK-RDG/(:num)', 'DocOnboard\PKRDG::EditAction/$1');
$routes->delete('/PK-RDG/Delete/(:num)', 'DocOnboard\PKRDG::deleteData/$1');


/*
* --------------------------------------------------------------------
 * Routes PK-RDA
 * --------------------------------------------------------------------
 */
$routes->get('/Personnel', 'Personnel::index');
$routes->post('Personnel-add', 'Personnel::insert');
$routes->post('/Personnel/update/(:num)', 'Personnel::update/$1');
$routes->post('/Personnel/pdf/(:num)', 'Personnel::getPdf/$1');
$routes->get('/Personnel/pdf/(:num)', 'Auth::index');
$routes->get('/Personnel/pdf/(:num)', 'Auth::index');
$routes->get('/Personnel/Convert', 'Personnel::Convert');
$routes->get('/Personnel/Print', 'Personnel::Print');
$routes->get('/Personnel/update/(:num)', 'Auth::index');
$routes->post('/Edit-Personnel/(:num)', 'Personnel::EditAction/$1');
$routes->delete('/Personnel/Delete/(:num)', 'Personnel::deleteData/$1');

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
