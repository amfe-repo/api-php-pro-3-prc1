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

//nuestra url será: http://localhost:8080/api/entities --> GET
<<<<<<< HEAD
$routes->group('api', ['namespace' => 'App/Controllers/API'], function ($routes) {
    $routes->get('entities', 'Entities::index');
    $routes->post('entities/create', 'Entities::create');
    $routes->put('entities/update', 'Entities::put_method');
    $routes->delete('entities/delete', 'Entities::delete_method');
=======
$routes->group('api',['namespace' => 'App/Controllers/API'],function($routes)
{ 
    $routes->get('entities','Entities::index');
    $routes->post('entities/create','Entities::create');

>>>>>>> 1e0131114d3da9cd5b67484dbb70bfb3c85d9d97
});

//nuestra url será: http://localhost:8080/api/jobsposted
$routes->group('api', ['namespace' => 'App/Controllers/API'], function ($routes) {
    $routes->get('jobsposted', 'JobsPosted::index');
    $routes->post('jobsposted', 'JobsPosted::create');
    $routes->put('jobsposted/update', 'Entities::put_method');
    $routes->delete('jobsposted/delete', 'Entities::delete_method');
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
