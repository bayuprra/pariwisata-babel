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
$routes->get('/', 'PlaceController::index');
$routes->get('/login', 'Users::signUp');
$routes->post('/register', 'Users::store');
$routes->post('/authenticate', 'Users::authenticate');
$routes->get('/logout', 'Users::logout', ['filter' => 'authGuard']);

// News
$routes->get('/news/show/(:num)', 'News::show/$1');
$routes->get('/admin/news', 'News::admin', ['filter' => 'adminGuard']);
$routes->group('news', ['filter' => 'adminGuard'], function ($routes) {
    $routes->get('create', 'News::create');
    $routes->get('edit/(:num)', 'News::edit/$1');
    $routes->post('/', 'News::store');
    $routes->post('(:num)', 'News::update/$1');
    $routes->delete('(:num)', 'News::destroy/$1');
});

// Event
$routes->get('/admin/event', 'Event::admin', ['filter' => 'adminGuard']);
$routes->group('event', ['filter' => 'adminGuard'], function ($routes) {
    $routes->get('create', 'Event::create');
    $routes->post('/', 'Event::store');
    $routes->get('edit/(:num)', 'Event::edit/$1');
    $routes->post('(:num)', 'Event::update/$1');
    $routes->delete('(:num)', 'Event::destroy/$1');
});

// Guide
$routes->get('/admin/guide', 'Guide::admin', ['filter' => 'adminGuard']);
$routes->get('/admin/vguide', 'Guide::adminv', ['filter' => 'adminGuard']);
$routes->group('guide', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('create', 'Guide::create');
    $routes->post('/', 'Guide::store');
    $routes->get('edit/(:num)', 'Guide::edit/$1');
    $routes->post('(:num)', 'Guide::update/$1');
    $routes->delete('(:num)', 'Guide::destroy/$1');
});

// Place
$routes->get('/admin/place', 'PlaceController::admin', ['filter' => 'adminGuard']);
$routes->get('/admin/vplace', 'PlaceController::adminv', ['filter' => 'adminGuard']);
$routes->group('place', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('create', 'PlaceController::create');
    $routes->post('/', 'PlaceController::store');
    $routes->get('edit/(:num)', 'PlaceController::edit/$1');
    $routes->post('(:num)', 'PlaceController::update/$1');
    $routes->delete('(:num)', 'PlaceController::destroy/$1');
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
