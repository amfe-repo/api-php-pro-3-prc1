<?php

namespace Config;

use App\Controllers\API\ScheduleJobs;
use App\Controllers\API\Entities;

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
$routes->get('/', 'Home::index');

// Entities routes http://localhost:8080/api/entities
$routes->get('api/entities','API\Entities::index');
$routes->post('api/entities/create','API\Entities::create');
$routes->get('/api/entities/search/(:num)', 'API\Entities::search/$1');
$routes->put('/api/entities/update/(:num)', 'API\Entities::update/$1');
$routes->delete('/api/entities/delete/(:num)','API\Entities::delete/$1');

// Categories routes http://localhost:8080/api/categories
$routes->get('api/categories','API\Categories::index');
$routes->post('api/categories/create','API\Categories::create');
$routes->get('/api/categories/search/(:num)', 'API\Categories::search/$1');
$routes->put('/api/categories/update/(:num)','API\Categores::update/$1');
$routes->delete('/api/categories/delete/(:num)','API\Categories::delete/$1');

//JobsPosted routes http://localhost:8080/api/jobsposted
$routes->get('api/jobsposted','API\JobsPosted::index');
$routes->post('api/jobsposted','API\Jobsposted::create');
$routes->get('/api/jobsposted/search/(:num)', 'API\Jobsposted::search/$1');

//ScheduleJob  routes http://localhost:8080/api/schedulejob
$routes->get('api/schedulejob','API\ScheduleJob::index');
$routes->post('api/schedulejob','API\ScheduleJob::create');
$routes->get('/api/schedulejob/search/(:num)', 'API\ScheduleJob::search/$1');

//Bussiness routes http://localhost:8080/api/bussiness
$routes->get('api/bussiness','API\Bussiness::index');
$routes->post('api/bussiness','API\Bussiness::create');
$routes->get('/api/bussiness/search/(:num)', 'API\Bussiness::search/$1');


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
