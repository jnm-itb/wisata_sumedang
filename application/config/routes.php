<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'app';

$route['master/'] = 'Master/index';
$route['master/(:any)'] = 'Master/index/$1';
$route['master/(:any)/(:any)'] = 'Master/index/$1/$2';
$route['master/(:any)/(:any)/(:any)'] = 'Master/index/$1/$2/$3';

$route['page/'] = 'App/page';
$route['page/(:any)'] = 'App/page/$1';
$route['page/(:any)/(:any)'] = 'App/page/$1/$2';
$route['page/(:any)/(:any)/(:any)'] = 'App/page/$1/$2/$3';


$route['dashboard/'] = 'Dashboard/index';
$route['dashboard/(:any)'] = 'Dashboard/index/$1';
$route['dashboard/(:any)/(:any)'] = 'Dashboard/index/$1/$2'; 


$route['download/'] = 'Download/index';
$route['download/(:any)'] = 'Download/index/$1'; 

$route['v/'] = 'App/play';
$route['v/(:any)'] = 'App/play/$1'; 
 
$route['embed/'] = 'App/embed';
$route['embed/(:any)'] = 'App/embed/$1'; 
 
 
$route['info/'] = 'App/info';
$route['info/(:any)'] = 'App/info/$1';
$route['info/(:any)/(:any)'] = 'App/info/$1/$2';
$route['info/(:any)/(:any)/(:any)'] = 'App/info/$1/$2/$3';



 
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

