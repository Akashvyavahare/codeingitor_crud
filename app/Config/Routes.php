<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/loginAuth', 'Home::loginAuth');

$routes->group('/', ['filter' => 'authGuard'], function($routes) 
{
  $routes->get('/dashbord', 'Dashbord::index');
  $routes->post('/addProduct', 'Dashbord::addProduct');
  $routes->post('/geSubcat', 'Dashbord::getSubcategories');
  $routes->get('/edit_product/(:num)', 'Dashbord::editdata/$1');
  $routes->post('/update_data','Dashbord::updatedata');
  
  $routes->get('/delet_product/(:num)', 'Dashbord::deleteProduct/$1');
});
$routes->get('/logout', 'Home::Logout');