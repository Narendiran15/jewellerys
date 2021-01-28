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
$route['404_override'] = 'errors/error_404';
$route['membership_register/(:num)'] = 'site/landing/membership_register/$1';
$route['pay'] = 'site/landing/pay';
$route['verify'] = 'site/landing/verify';
$route['default_controller'] = 'site/landing/index';
$route['logout'] = 'site/landing/logout';
$route['dashboard'] = 'site/landing/dashboard';

$route['member_reference/(:any)'] = 'site/landing/member_reference/$1';
$route['edit_membership_register/(:any)'] = 'site/landing/edit_membership_register/$1';
$route['view_application'] = 'site/landing/view_application/';
$route['get_application_form'] = 'site/landing/get_application_form/';

$route['member_branchs/(:any)'] = 'site/landing/member_branchs/$1';
$route['update_branch/(:any)'] = 'site/landing/update_branch/$1';
$route['membership_option/(:any)'] = 'site/landing/membership_option/$1';
$route['edit_members'] = 'site/landing/edit_members';
$route['edit_profile'] = 'site/landing/edit_profile';
$route['delete_office/(:any)'] = 'site/landing/delete_office/$1';
$route['edit_delete_office/(:any)'] = 'site/landing/edit_delete_office/$1';
$route['password_change/(:num)'] = 'site/landing/password_change/$1';
$route['change_password'] = 'site/landing/change_password';
$route['export_company'] = 'site/landing/export_company';
$route['members_news_list'] = 'site/landing/members_news_list';
$route['member_news/(:any)/(:num)'] = 'site/landing/member_news/$1/$2';
$route['industry_news/(:any)/(:num)'] = 'site/landing/industry_news/$1/$2';
$route['referrals'] = 'site/landing/referrals';
$route['news'] = 'site/landing/news';
$route['members'] = 'site/landing/member_directory';
$route['summits'] = 'site/landing/upcomming_summits';
$route['contact'] = 'site/landing/contact';
$route['page/(:any)'] = 'site/cms/page/$1';
$route['services/(:any)'] = 'site/cms/services/$1';
$route['company/(:any)/(:num)'] = 'site/landing/company/$1/$2';
$route['reference_link/(:num)/(:any)'] = 'site/landing/reference_link/$1/$2';


$route['invoice/(:num)'] = 'site/student/invoice/$1';


//admin
$route['admin'] = 'admin/admin_settings/login';
$route['admin/dashboard'] = 'admin/admin_settings/dashboard';

