<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// register new user route
$route['register-user'] = 'Auth/create_user';

// seller dashboard route
$route['seller-dashboard'] = 'Seller_dasboard';

// upload product route
$route['upload-product'] = 'Seller_dasboard/upload_product';

//change password route
$route['change-password'] = 'Auth/change_password';

//update user profile route
$route['save'] = 'Seller_dasboard/edit_profile';

//user registration code verification code
$route['code-verify'] = 'Auth/verifycode';

//user login 
$route['login'] = 'Auth/login';

//Sepcific Product Details
$route['product-detail/:num'] = 'Products/view_product';

//checkout
$route['checkout'] = 'cart/checkout';

//edit product
$route['edit-product/(:any)'] = 'Seller_dasboard/edit_product';

// buyer dashboard route
$route['buyer-dashboard'] = 'Buyer_dashboard';

// Feature Product route
$route['featured-products'] = 'Products/feature_products';

// Product Category route
$route['products-category/(:any)'] = 'products/products_by_category';

// Product Category route
$route['search-products/(:any)'] = '';

$route['contactus'] = 'AboutUs/contactus';


//products by category
// $route['products/(:any)'] = 'Products/products_by_category';




