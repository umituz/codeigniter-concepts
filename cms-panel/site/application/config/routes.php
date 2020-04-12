<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(BASEPATH."database/DB.php");
$db = &DB();
$menus = $db->get("menus");
$result = $menus->result();
foreach ($result as $menu) 
{
	if($menu->type == "1"){
		$route[$menu->url] = "home_controller/page/$menu->id";
	}else if($menu->type == "2"){
		$route[$menu->url] = "home_controller/page/$menu->id"; 
	}
}

$route['default_controller'] 	    = 'home_controller';
$route['404_override'] 			    = '';
$route['translate_uri_dashes'] 	    = FALSE;

$route["urun-listesi"] 				= "home_controller/product_list";
$route["urun-detay/(:any)"]   	    = "home_controller/product_detail/$1";

$route["portfolyo-listesi"]		    = "home_controller/portfolio_list";
$route["portfolyo-detay/(:any)"]   	= "home_controller/portfolio_detail/$1";

$route["egitim-listesi"] 			= "home_controller/course_list";
$route["egitim-detay/(:any)"]   	= "home_controller/course_detail/$1";

$route["haberler"] 			   		= "home_controller/news_list";
$route["haber/(:any)"]   			= "home_controller/news_detail/$1";


$route["referanslar"] 				= "home_controller/reference_list";
$route["markalar"] 					= "home_controller/brand_list";
$route["hizmetler"]   				= "home_controller/service_list";
$route["hakkimizda"]   				= "home_controller/about_us";

$route["iletisim"]   				= "home_controller/contact";
$route["mesaj-gonder"]   			= "home_controller/send_contact_message";

$route["fotograf-galerisi"] 		= "home_controller/image_gallery_list";
$route["fotograf-galerisi/(:any)"]  = "home_controller/image_gallery_detail/$1";

$route["video-galerisi"] 		    = "home_controller/video_gallery_list";
$route["video-galerisi/(:any)"]	    = "home_controller/video_gallery_detail/$1";

$route["dosya-galerisi"] 		    = "home_controller/file_gallery_list";
$route["dosya-galerisi/(:any)"]     = "home_controller/file_gallery_detail/$1";