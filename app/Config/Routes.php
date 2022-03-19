<?php

namespace Config;

use App\Controllers\API\ScheduleJobs;

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


$routes->group('api',['namespace' => 'App/Controllers/API'],function($routes)
{
    // Entities routes http://localhost:8080/api/entities
    $routes->get('entities','Entities::index');
    $routes->post('entities/create','Entities::create');
    //$routes->get('entities/search/', 'Entities::search');

    // Categories routes http://localhost:8080/api/categories
    $routes->get('categories','Categories::index');
    $routes->post('categories/create','Categories::create');

    //JobsPosted routes http://localhost:8080/api/jobsposted
    $routes->get('jobsposted','JobsPosted::index');
    $routes->post('jobsposted','Jobsposted::create');

    //ScheduleJob  routes http://localhost:8080/api/schedulejob
    $routes->get('schedulejob','ScheduleJob::index');
    $routes->post('schedulejob','ScheduleJob::create');

    //Bussiness routes http://localhost:8080/api/bussiness
    $routes->get('bussiness','Bussiness::index');
    $routes->post('bussiness','Bussiness::create');
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
