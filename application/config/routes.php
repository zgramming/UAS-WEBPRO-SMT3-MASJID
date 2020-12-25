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

//! Backend
$route['admin/dashboard'] = 'admin/a_dashboard';
//Product
$route['admin/product'] = 'admin/a_product';
$route['admin/product/addForm'] = 'admin/a_product/addForm';
$route['admin/product/add'] = 'admin/a_product/add';

$route['admin/editProduct/(:any)'] = 'admin/a_product/editForm/$i';
$route['admin/updateProduct/(:any)'] = 'admin/a_product/update/$i';

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

//* Khutbah
$route['admin/khutbah'] = 'admin/a_khutbah';
$route['admin/khutbah/addForm'] = 'admin/a_khutbah/addForm';
$route['admin/khutbah/add'] = 'admin/a_khutbah/add';

$route['admin/editKhutbah/(:any)'] = 'admin/a_khutbah/editForm/$i';
$route['admin/updateKhutbah/(:any)'] = 'admin/a_khutbah/update/$i';

$route['admin/deleteKhutbah/(:any)'] = 'admin/a_khutbah/delete/$i';
//* Khutbah Category
$route['admin/khutbah/category'] = 'admin/a_khutbah/category';
$route['admin/khutbah/category/addForm'] = 'admin/a_khutbah/categoryAddForm';
$route['admin/khutbah/category/add'] = 'admin/a_khutbah/categoryAdd';

$route['admin/editCategoryKhutbah/(:any)'] = 'admin/a_khutbah/categoryEditForm/$i';
$route['admin/updateCategoryKhutbah/(:any)'] = 'admin/a_khutbah/categoryUpdate/$i';

$route['admin/deleteCategoryKhutbah/(:any)'] = 'admin/a_khutbah/categoryDelete/$i';

//* Ustadz
$route['admin/ustadz'] = 'admin/a_ustadz';

$route['admin/ustadz/addForm'] = 'admin/a_ustadz/addForm';
$route['admin/ustadz/add'] = 'admin/a_ustadz/add';

$route['admin/deleteUstadz/(:any)'] = 'admin/a_ustadz/delete/$i';

$route['admin/editUstadz/(:any)'] = 'admin/a_ustadz/editForm/$i';
$route['admin/updateUstadz/(:any)'] = 'admin/a_ustadz/update/$i';

//* Management
$route['admin/management'] = 'admin/a_management';
$route['admin/management/addForm'] = 'admin/a_management/addForm';
$route['admin/management/add'] = 'admin/a_management/add';

$route['admin/editManagement/(:any)'] = 'admin/a_management/editForm/$i';
$route['admin/updateManagement/(:any)'] = 'admin/a_management/update/$i';

$route['admin/deleteManagement/(:any)'] = 'admin/a_management/delete/$i';

//* Jabatan Management
$route['admin/management/category'] = 'admin/a_management/category';
$route['admin/management/category/addForm'] = 'admin/a_management/categoryAddForm';
$route['admin/management/category/add'] = 'admin/a_management/categoryAdd';

$route['admin/editCategoryManagement/(:any)'] = 'admin/a_management/categoryEditForm/$i';
$route['admin/updateCategoryManagement/(:any)'] = 'admin/a_management/categoryUpdate/$i';

$route['admin/deleteCategoryManagement/(:any)'] = 'admin/a_management/categoryDelete/$i';

//* Inventory
$route['admin/inventory'] = 'admin/a_inventory';
$route['admin/inventory/addForm'] = 'admin/a_inventory/addForm';
$route['admin/inventory/add'] = 'admin/a_inventory/add';

$route['admin/editInventory/(:any)'] = 'admin/a_inventory/editForm/$i';
$route['admin/updateInventory/(:any)'] = 'admin/a_inventory/update/$i';

$route['admin/deleteInventory/(:any)'] = 'admin/a_inventory/delete/$i';

//* Inventory Category
$route['admin/inventory/category'] = 'admin/a_inventory/category';
$route['admin/inventory/category/addForm'] = 'admin/a_inventory/categoryAddForm';
$route['admin/inventory/category/add'] = 'admin/a_inventory/categoryAdd';

$route['admin/editCategoryInventory/(:any)'] = 'admin/a_inventory/categoryEditForm/$i';
$route['admin/updateCategoryInventory/(:any)'] = 'admin/a_inventory/categoryUpdate/$i';

$route['admin/deleteCategoryInventory/(:any)'] = 'admin/a_inventory/categoryDelete/$i';

//* News
$route['admin/news'] = 'admin/a_news';
$route['admin/news/addForm'] = 'admin/a_news/addForm';
$route['admin/news/add'] = 'admin/a_news/add';

$route['admin/editNews/(:any)'] = 'admin/a_news/editForm/$i';
$route['admin/updateNews/(:any)'] = 'admin/a_news/update/$i';

$route['admin/deleteNews/(:any)'] = 'admin/a_news/delete/$i';

//* Mosque
$route['admin/mosque'] = 'admin/a_mosque';
$route['admin/updateMosque/(:any)'] = 'admin/a_mosque/update/$i';
// $route['admin/news/addForm'] = 'admin/a_news/addForm';
// $route['admin/news/add'] = 'admin/a_news/add';

// $route['admin/editNews/(:any)'] = 'admin/a_news/editForm/$i';
// $route['admin/updateNews/(:any)'] = 'admin/a_news/update/$i';

// $route['admin/deleteNews/(:any)'] = 'admin/a_news/delete/$i';


//! Front End

$route['home'] = 'frontend/f_home';
$route['khutbah/(:any)'] = 'frontend/f_home/khutbah/$i';
$route['news/(:any)'] = 'frontend/f_home/news/$i';
$route['inventory'] = 'frontend/f_home/inventory';


$route['sendSuggestion'] = 'frontend/f_home/addSuggestion';

$route['detail/(:any)'] = 'frontend/f_home/detail/$i';
