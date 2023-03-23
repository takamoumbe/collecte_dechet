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



/* ================ Dashboard Controller ================ */
 
$routes->get('/',       'Dashboard::index');
$routes->get('Open',    'Dashboard::login');
$routes->get('Home',    'Dashboard::home');
$routes->get('Save',    'Dashboard::saving');
$routes->get('List',    'Dashboard::Listing');



/* ================ Users Controller ================ */


$routes->get('getCharger',      'UserController::list_charge');
$routes->get('getAgence',       'UserController::list_agence');
$routes->get('oneUser/(:num)',  'UserController::show/$1');
$routes->post('newUser',        'UserController::create');
$routes->post('upUser/(:num)',  'UserController::update/$1');
$routes->post('enaUser/(:num)', 'UserController::enable/$1');
$routes->post('desUser/(:num)', 'UserController::desable/$1');



/* ================ Clients Controller ================ */


$routes->get('allClients',      'ClientController::list');
$routes->get('oneClient/(:num)','ClientController::show/$1');
$routes->post('newClient',      'ClientController::create');
$routes->post('upClient/(:num)','ClientController::update/$1');
$routes->post('enaClient/(:num)','ClientController::enable/$1');
$routes->post('desClient/(:num)','ClientController::desable/$1');



/* ================ Dechets Controller ================ */


$routes->get('getDechets',      'DechetController::list');
$routes->get('oneDechet/(:num)','DechetController::show/$1');
$routes->post('newDechet',      'DechetController::create');
$routes->post('upDechet/(:num)','DechetController::update/$1');
$routes->post('enaDech/(:num)', 'DechetController::enable/$1');
$routes->post('desDech/(:num)', 'DechetController::desable/$1');



/* ================ Depot Controller ================ */


$routes->get('getDepots',       'DepotController::list');
$routes->get('oneDepot/(:num)', 'DepotController::show/$1');
$routes->post('newDepot',       'DepotController::create');
$routes->post('upDepot/(:num)', 'DepotController::update/$1');
$routes->post('enaDep/(:num)',  'DepotController::enable/$1');
$routes->post('desDep/(:num)',  'DepotController::desable/$1');



/* ================ Taches Controller ================ */


$routes->get('getTaches',       'TachesController::list');
$routes->get('oneTache/(:num)', 'TachesController::show/$1');
$routes->post('addTache',       'TachesController::create');
$routes->post('moveTache/(:num)',    'TachesController::create');
$routes->post('upTache/(:num)', 'TachesController::update/$1');
$routes->post('enTache/(:num)', 'TachesController::enable/$1');
$routes->post('desTache/(:num)','TachesController::desable/$1');





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
