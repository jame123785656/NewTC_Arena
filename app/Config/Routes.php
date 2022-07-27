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
$routes->get('/', 'index::index');
$routes->get('/login', 'Login::login');
$routes->get('/register', 'Register::register');
$routes->get('/review', 'index::review');
$routes->get('/user', 'User::user',['filter' => 'auth']);
$routes->get('/logout', 'Login::logout');
$routes->get('/stadium', 'Stadium::stadium');
$routes->get('/profile', 'User::profile',['filter' => 'auth']);
$routes->get('/editprofile/(:num)', 'user::edit/$1');
$routes->get('/user_review', 'User_review::user_review',['filter' => 'auth']);
$routes->get('/index_admin', 'Index_admin::index_admin',['filter' => 'auth']);
$routes->get('/bookingpage', 'Bookingpage::bookingpage',['filter' => 'auth']);
$routes->get('/manageuser', 'Manageuser::manageuser',['filter' => 'auth']);
$routes->get('/pay/(:num)', 'Pay::pay/$1',['filter' => 'auth']);
$routes->get('/edit_admin/(:num)', 'Index_admin::edit_admin/$1',['filter' => 'auth']);
$routes->get('/userhistory/(:num)', 'Userhistory::userhistory/$1',['filter' => 'auth']);
$routes->get('/pay_admin', 'Pay_admin::pay_admin',['filter' => 'auth']);
$routes->get('/update_pay/(:any)', 'Pay_admin::update_pay/$1');
$routes->get('/cancel_pay/(:any)', 'Pay_admin::cancel_pay/$1');
$routes->get('/Cancel_reservation/(:any)', 'Pay_admin::Cancel_reservation/$1');
$routes->get('/report_admin', 'Report_admin::report_admin',['filter' => 'auth']);
$routes->get('/promotion_admin', 'Index_admin::promotion_admin',['filter' => 'auth']);
$routes->get('/historyadmin/(:num)', 'Historyadmin::historyadmin/$1',['filter' => 'auth']);
$routes->get('/cancel_booking/(:any)', 'userhistory::cancel_booking/$1');
$routes->get('/forgotpassword', 'Forgotpassword::forgotpassword');
$routes->get('/reset_password/(:any)', 'Forgotpassword::reset_password/$1');
$routes->get('/report_all', 'report_admin::Report_All',['filter' => 'auth']);
$routes->get('/payadmin_all', 'Pay_admin::Payadmin_All',['filter' => 'auth']);





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
