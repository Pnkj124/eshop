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
$routes->setDefaultNamespace('App\Controllers\Web');
$routes->setDefaultController('HomeController');
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
$routes->get('/', 'HomeController::index',["namespace" => "App\Controllers\Web","filter" => "noauth"]);
$routes->get('categories/(:any)', 'HomeController::products/$1',["namespace" => "App\Controllers\Web","filter" => "noauth"]);
$routes->get('product/(:any)', 'HomeController::product_detail/$1',["namespace" => "App\Controllers\Web","filter" => "noauth"]);


$routes->match(['get', 'post'], 'login', 'UserController::login', ["namespace" => "App\Controllers","filter" => "noauth"]);
$routes->get('register', 'HomeController::register', ["namespace" => "App\Controllers\Web","filter" => "noauth"]);
$routes->get('web/login', 'HomeController::login', ["namespace" => "App\Controllers\Web","filter" => "noauth"]);
$routes->post('register', 'UserController::register_user', ["namespace" => "App\Controllers","filter" => "noauth"]);

$routes->post('products/buy', 'OrderController::buy', ["namespace" => "App\Controllers","filter" => "noauth"]);

$routes->get('logout', 'UserController::logout',["namespace" => "App\Controllers"]);
$routes->get('web/logout', 'UserController::user_logout',["namespace" => "App\Controllers"]);

$routes->get('web/cart', 'HomeController::cart',["namespace" => "App\Controllers\Web","filter" => "noauth"]);
$routes->post('web/cart/(:num)/update-quantity', 'HomeController::update_order_item/$1',["namespace" => "App\Controllers\Web","filter" => "noauth"]);
$routes->get('web/cart/(:num)/remove', 'HomeController::remove_order_item/$1',["namespace" => "App\Controllers\Web","filter" => "noauth"]);

// Admin routes
$routes->group("admin", ["namespace" => "App\Controllers","filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::index");

    //other admin controllers that is to be followed by the admin prefixed route
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('setting', 'SettingController::index');

    $routes->get('products', 'ProductController::index');

    $routes->get('products/add', 'ProductController::add');
    $routes->get('products/(:num)/detail', 'ProductController::product_detail/$1');
    $routes->post('products/create', 'ProductController::create');
    $routes->get('products/(:num)/edit', 'ProductController::edit/$1');
    $routes->post('products/update', 'ProductController::update');
    $routes->get('products/(:num)/delete', 'ProductController::delete/$1');
    $routes->get('products/(:num)/draft', 'ProductController::draft/$1');
    $routes->get('products/(:num)/publish', 'ProductController::publish/$1');

    $routes->get('categories', 'CategoryController::index');

    $routes->get('brands', 'BrandController::index');
    $routes->get('brands/add', 'BrandController::add');
    $routes->post('brands/create', 'BrandController::create');
    $routes->get('brands/(:num)/edit', 'BrandController::edit/$1');
    $routes->post('brands/update', 'BrandController::update');
    $routes->get('brands/(:num)/delete', 'BrandController::delete/$1');
    $routes->get('brands/(:num)/draft', 'BrandController::draft/$1');
    $routes->get('brands/(:num)/publish', 'BrandController::publish/$1');

    $routes->get('orders', 'OrdersController::index');
    $routes->get('slider', 'SliderController::index');
});
// Editor routes
$routes->group("editor", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "EditorController::index");
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
