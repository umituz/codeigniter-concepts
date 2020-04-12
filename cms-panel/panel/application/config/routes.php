<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = "UserOperation/login";
$route['logout'] = "UserOperation/logout";
$route['sifremi-unuttum'] = "UserOperation/forget_password";
$route['reset-password'] = "UserOperation/reset_password";