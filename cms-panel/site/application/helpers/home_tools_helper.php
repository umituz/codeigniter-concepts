<?php 

function get_bottom_menus($menu_id)
{
	$ci = &get_instance();
	$ci->load->model("menu_model");
	$submenus = $ci->menu_model->get_bottom_menus($menu_id);
	return $submenus;
}

function get_top_menus()
{
	$ci = &get_instance();
	$ci->load->model("menu_model");
	$menus = $ci->menu_model->get_all(array("top =" => 0));
	return $menus;
}

function get_gallery_cover_image($folder_name){
	$path = "uploads/gallery/image/$folder_name/350x216";
	if($handle = opendir($path)){
		while (($file = readdir($handle)) !== false) {
			if($file != "." && $file != ".."){
				return $file;
			}
		}
		return "uploads/default/picture.png";
	}
	
}

function get_picture($path,$picture,$resolution="50x50"){
	if($picture != ""){
		if(file_exists(FCPATH."uploads/$path/$resolution/$picture")){
			$picture = base_url("uploads/$path/$resolution/$picture");
		}else{
			$picture = base_url("uploads/default/picture.png");	
		}
	}else{
		$picture = base_url("uploads/default/picture.png");
	}

	return $picture;

}

function get_gallery_by_url($url = ""){
	$ci = &get_instance();
	$ci->load->model("gallery_model");
	$gallery = $ci->gallery_model->get(
		array(
			"isActive"		=> 1,
			"url" 			=> $url
		)
	);

	return ($gallery) ? $gallery : false;
}

function get_portfolio_cover_image($portfolio_id){
	$ci = &get_instance();
	$ci->load->model("portfolio_image_model");
	$cover_image = $ci->portfolio_image_model->get(
		array(
			"isCover"	=> 1,
			"portfolio_id" => $portfolio_id
		)
	);
	if(empty($cover_image)){
		$cover_image = $ci->portfolio_image_model->get(
			array(
				"portfolio_id" => $portfolio_id
			)
		);
	}
	return !empty($cover_image) ? $cover_image->img_url : "default.jpg";
}

function get_category_title($category_id = 0)
{
	$ci = &get_instance();
	$ci->load->model("portfolio_category_model");
	$category = $ci->portfolio_category_model->get(
		array("id" => $category_id)
	);
	if($category)
		return $category->title;	
	else
		return false;
}

function get_readable_date($date)
{
	setlocale(LC_ALL, 'turkish');	
	return iconv('latin5','utf-8',strftime(' %d %B %Y %A ',strtotime($date)));
}

function get_settings()
{
	$ci = &get_instance();

	//$settings = $ci->session->userdata("settings");
	//if(empty($settings)){
	$ci->load->model("setting_model");
	$settings = $ci->setting_model->get();
	$ci->session->set_userdata("settings",$settings);
	//}
	return $settings;
}

function get_product_cover_image($product_id){
	$ci = &get_instance();
	$ci->load->model("product_image_model");
	$cover_image = $ci->product_image_model->get(
		array(
			"isCover"	=> 1,
			"product_id" => $product_id
		)
	);
	if(empty($cover_image)){
		$cover_image = $ci->product_image_model->get(
			array(
				"product_id" => $product_id
			)
		);
	}
	return !empty($cover_image) ? $cover_image->img_url : "default.jpg";
}