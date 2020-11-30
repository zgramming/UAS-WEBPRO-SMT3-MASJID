<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['admin/dashboard'] = 'admin/a_dashboard';
//Product
$route['admin/product'] = 'admin/a_product';
$route['admin/product/addForm'] = 'admin/a_product/addForm';
$route['admin/product/add'] = 'admin/a_product/add';

$route['admin/editProduct/(:any)'] = 'admin/a_product/edit/$i';

$route['admin/deleteProduct/(:any)'] = 'admin/a_product/delete/$i';

// Category
$route['admin/category'] = 'admin/a_category';
$route['admin/category/addForm'] = 'admin/a_category/addForm';
$route['admin/category/add'] = 'admin/a_category/add';

$route['admin/editCategory/(:any)'] = 'admin/a_category/editForm/$i';
$route['admin/updateCategory/(:any)'] = 'admin/a_category/update/$i';

$route['admin/deleteCategory/(:any)'] = 'admin/a_category/delete/$i';

// Unit
$route['admin/unit'] = 'admin/a_unit';
$route['admin/unit/addForm'] = 'admin/a_unit/addForm';
$route['admin/unit/add'] = 'admin/a_unit/add';

$route['admin/editUnit/(:any)'] = 'admin/a_unit/editForm/$i';
$route['admin/updateUnit/(:any)'] = 'admin/a_unit/update/$i';

$route['admin/deleteUnit/(:any)'] = 'admin/a_unit/delete/$i';
