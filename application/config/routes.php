<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'dasboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login/(:num)'] = 'login/index/$1';
$route['cadastrar/erro/(:num)'] = 'cadastrar/erro/$1';
