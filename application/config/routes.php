<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "authentication";
$route['scaffolding_trigger'] = "";
$route['admin'] = "admin/Newcon";
$route['admin/login'] = "admin/Newcon/login";
$route['admin/logout'] = "admin/Newcon/logout";
$route['admin/request'] = "admin/Newcon/request";
$route['admin/users_search'] = "admin/Newcon/users_search";
$route['admin/users_search/(:num)'] = "admin/Newcon/users_search/$1";
$route['admin/add_books'] = "admin/Newcon/add_books";
$route['admin/add_ebooks'] = "admin/Newcon/add_ebooks";
$route['admin/journals'] = "admin/Newcon/journals";
$route['admin/member'] = "admin/Newcon/add_member";
$route['admin/add_member_process'] = "admin/Newcon/add_member_process";
$route['admin/home'] = "admin/Newcon/home";
$route['admin/facilities'] = "admin/Newcon/facilities";
$route['admin/hours'] = "admin/Newcon/hours";
$route['admin/rules'] = "admin/Newcon/rules";
$route['user_autentication'] = "admin/Newcon/login_process";
$route['logout_FE'] = "admin/Newcon/logout_FE";
$route['admin/list'] = "admin/Newcon/list_member";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */