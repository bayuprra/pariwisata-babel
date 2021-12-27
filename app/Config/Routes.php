<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Users::index');
$routes->get('/login', 'Users::signUp');
$routes->post('/register', 'Users::store');

// news
$routes->get('/admin/news', 'News::admin');
$routes->get('/news/create', 'News::create');
$routes->get('/news/show/(:num)', 'News::show/$1');
$routes->get('/news/edit/(:num)', 'News::edit/$1');
$routes->post('/news', 'News::store');
$routes->post('/news/(:num)', 'News::update/$1');
$routes->delete('/news/(:num)', 'News::destroy/$1');

// event
$routes->get('/admin/event', 'Event::admin');
$routes->get('/event/create', 'Event::create');
$routes->post('/event', 'Event::store');
$routes->get('/event/edit/(:num)', 'Event::edit/$1');
$routes->post('/event/(:num)', 'Event::update/$1');
$routes->delete('/event/(:num)', 'Event::destroy/$1');


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
