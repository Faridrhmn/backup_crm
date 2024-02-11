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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'utama';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Admin Routes
$route['app'] = 'admin/app';
$route['admin/dashboard'] = 'admin/agen';
$route['admin/prospek'] = 'admin/prospek';
$route['admin2/prospek'] = 'admin2/prospek';
$route['admin/customer'] = 'admin/customer';
$route['admin/agen'] = 'admin/agen';
$route['admin/video-promosi'] = 'admin/video_promosi';

//Authentication
$route['login'] = 'auth/login';
$route['utama'] = 'utama/index';

//Api

//Login
$route['api/login'] = 'api/login/login';
//Prospek
$route['api/prospek'] = 'api/prospek/show';
$route['api/prospek/add'] = 'api/prospek/tambah';
$route['api/prospek/remove/(:any)'] = 'api/prospek/hapus/$1';
$route['api/prospek/cariEdit/(:any)'] = 'api/prospek/cari/$1';
$route['api/prospek/update/(:any)'] = 'api/prospek/perbarui/$1';
$route['api/prospek/up'] = 'api/prospek/pindah';
$route['api/prospek/status/(:any)'] = 'api/prospek/ganti/$1';
//Customer
$route['api/customer'] = 'api/customer/show';
$route['api/customer/remove/(:any)/(:any)'] = 'api/customer/hapus/$1/$2';
$route['api/customer/cariData/(:any)'] = 'api/customer/cari/$1';
$route['api/customer/update/(:any)/(:any)'] = 'api/customer/perbarui/$1/$2';
$route['api/customer/up'] = 'api/customer/pindah';
//Agen
$route['api/agen'] = 'api/agen/show';
$route['api/agen/remove/(:any)/(:any)/(:any)/(:any)'] = 'api/agen/hapus/$1/$2/$3/$4';