<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

//User
$routes->get('/', 'Home::index');
$routes->get('/history', 'User\History::index');
$routes->get('/about', 'User\About::index');
$routes->post('/submit', 'User\Report::create');

//Reports (Admin)
$routes->get('/reportspending', 'Admin\Reports::reportsPending');
$routes->get('/reportspending/(:segment)', 'Admin\Reports::reportsNotif/$1');
$routes->post('/reportspending', 'Admin\Reports::reportsPending');
$routes->get('/solved/(:segment)', 'Admin\Reports::updateSolved/$1');
$routes->get('/declined/(:segment)', 'Admin\Reports::updateDeclined/$1');
$routes->get('/reportssolved', 'Admin\Reports::reportsSolved');
$routes->post('/reportssolved', 'Admin\Reports::reportsSolved');
$routes->get('/reportsdeclined', 'Admin\Reports::reportsDeclined');
$routes->post('/reportsdeclined', 'Admin\Reports::reportsDeclined');

//User Management (Admin)
$routes->get('/usermanagement', 'Admin\UserManagement::index');
$routes->post('/usermanagement', 'Admin\UserManagement::index');
$routes->get('/promote/(:segment)', 'Admin\UserManagement::promote/$1');
$routes->get('/delete/(:segment)', 'Admin\UserManagement::delete/$1');

//Service Management (Admin)
$routes->get('/service', 'Admin\Service::index');
$routes->post('/service', 'Admin\Service::index');
$routes->get('/servicecreate', 'Admin\Service::servicecreate');
$routes->get('/serviceedit/(:segment)', 'Admin\Service::serviceedit/$1');
$routes->post('/create', 'Admin\Service::create');
$routes->post('/update/(:segment)', 'Admin\Service::update/$1');
$routes->get('/deleteservice/(:segment)', 'Admin\Service::delete/$1');

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
