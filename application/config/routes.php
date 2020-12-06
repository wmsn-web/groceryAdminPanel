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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['admin_panel/([a-z]+)/(:any)'] = "admin_panel/home/$1/$2";
$route['admin_panel/([a-z]+)'] = "admin_panel/home/$1";
$route['admin_panel'] = "admin_panel/home";

$route['api/cart/add'] = "api/cart/addtoCart/$1";
$route['api/cart/update'] = "api/cart/updateCart/$1";
$route['api/cart/cart-items/(:any)'] = "api/cart/itemsCart/$1";
$route['api/cart/delete/(:any)'] = "api/cart/deletefromCart/$1";
$route['api/authentication/registration'] = "api/authentication/registration/$1";
$route['api/authentication/login'] = "api/authentication/login/$1";
$route['api/authentication/user'] = "api/authentication/user/$1";
$route['api/authentication/user'] = "api/authentication/user/$1";
$route['api/authentication/facebook_google'] = "api/authentication/facebookgooglesignup/$1";
$route['api/authentication/forgotpass'] = "api/authentication/Forgotpass/$1";
$route['api/authentication/changepass'] = "api/authentication/ChangePass/$1";
$route['api/product/category_products/(:any)/(:any)/(:any)'] = "api/product/category_products/$1/$2/$3";
$route['api/product/allCategory'] = "api/product/allCategory";
$route['api/product/review/(:any)/(:any)/(:any)'] = "api/product/productReview/$1/$2/$3";
$route['api/product/review/add'] = "api/product/addToReview/$1";
$route['api/product/(:any)/(:any)/(:any)'] = "api/product/index/$1/$2/$3";
$route['api/avgrate_by_single/(:any)'] = "api/product/avgratebysingle/$1";
$route['api/product/offers/(:any)/(:any)'] = "api/product/offers/$1/$2";
$route['api/product/search-result'] = "api/product/searchproduct";
$route['api/wishlist/wishlist-items/(:any)'] = "api/wishlist/itemsWishlist/$1";
$route['api/wishlist/add'] = "api/wishlist/addtoWishlist/$1";
$route['api/wishlist/update'] = "api/wishlist/updateWishlist/$1";
$route['api/wishlist/delete/(:any)'] = "api/wishlist/deletefromWishlist/$1";
$route['api/offers/alloffers'] = "api/offers/allOfferList/$1";
$route['api/offers/offerdetails/(:any)'] = "api/offers/Offersingle/$1";
$route['api/adbanner/(:any)'] = "api/product/addDetails/$1";
$route['api/user/update/(:any)'] = "api/user/updateuser/$1";
$route['api/user_referral/(:any)'] = "api/user/Myreferral/$1";
$route['api/user_profilepicture/(:any)'] = "api/user/updateuserprofileimage/$1";

$route['api/wallet/(:any)'] = "api/user/Mywallet/$1";

$route['api/plans/(:any)'] = "api/subscription/membershiplist/$1";
$route['api/order/orderdetails/(:any)'] = "api/order/itemsOrder/$1";
$route['api/order/addorder/(:any)'] = "api/order/addtoOrder/$1";
$route['api/order/availableship/(:any)'] = "api/order/shippingavailable/$1";
$route['api/order/ordersuccess/(:any)/(:any)'] = "api/order/OrderReturn/$1/$2";
$route['api/order/orderlist/(:any)'] = "api/order/OrderList/$1";
/* Brand */
$route['api/brands/brandlist/(:any)'] = "api/product/allBrands/$1";
$route['api/product/brands_products/(:any)/(:any)/(:any)'] = "api/product/brand_products/$1/$2/$3";
/* Shipping */
$route['api/shippinglist/(:any)'] = "api/ShippingAddress/itemsShipping/$1";
$route['api/shippingdetails/(:any)'] = "api/ShippingAddress/itemssingleShipping/$1";
$route['api/shipping/add/(:any)'] = "api/ShippingAddress/addtoShipping/$1";
$route['api/shipping/delete/(:any)'] = "api/ShippingAddress/deletefromOrder/$1";

$route['api/appseting/(:any)/(:any)'] = "api/product/appsetting/$1/$2";