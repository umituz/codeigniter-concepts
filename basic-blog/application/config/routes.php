<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'anasayfa';
$route['anasayfa/(:any)'] = 'anasayfa';
$route['makale/(:any)'] = 'anasayfa/makale/$1';
$route['iletisim'] = 'anasayfa/iletisim';
$route['mesajgonder'] = 'anasayfa/mesajgonder';
$route['404_override'] = 'hata';
$route['translate_uri_dashes'] = FALSE;
