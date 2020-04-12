<?php

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

function upload_picture($file,$uploadPath,$width,$height,$name){
	$ci = &get_instance();
	$ci->load->library("simpleimagelib");

	if(!is_dir("{$uploadPath}/{$width}x{$height}")){
		mkdir("{$uploadPath}/{$width}x{$height}");
	}

	$upload_error = false;

	try 
	{
		$simpleImage = $ci->simpleimagelib->get_simple_image_instance();

		$simpleImage
		->fromFile($file)  
		->thumbnail($width, $height, 'center')            
		->toFile("{$uploadPath}/{$width}x{$height}/{$name}", 'image/png');     
	}
	catch(Exception $err) 
	{
		$error = $err->getMessage();
		$upload_error = true;
	}

	if($upload_error){
		echo $error;
	}else{
		return true;
	}
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
		return "<b style='color:red'>Tanımlı Değil</b>";
}

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

function get_settings()
{
	$ci = &get_instance();
	$ci->load->model("setting_model");
	if($ci->session->userdata("settings"))
	{
		$settings = $ci->session->userdata("settings");
	}
	else
	{
		$settings = $ci->setting_model->get();

		if(!$settings)
		{
			$settings = new stdClass;
			$settings->company_name = "Kontrol Paneli";
			$settings->logo = "default";
		}

		$ci->session->set_userdata("settings",$settings);
	}
	
	return $settings;
}

function convertToSEO($text)
{
	$from = array("ü","Ü","ç","Ç","ğ","Ğ","ö","Ö","İ","ı","ş","Ş",".",",","'","\""," ","!","?","*","_","|","=","(",")","[","]","{","}","%","<",">",";",":","`","/");
	$to    = array("u","u","c","C","g","g","o","o","i","i","s","s","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-");  
	return strtolower(str_replace($from, $to, $text));
}

function pre($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function getImageFileName($model,$id)
{
	$ci = &get_instance();
	$file = $ci->$model->get(
		array("id" => $id)
	);
	if($model == "setting_model")
	{
		return $file->logo;
	}
	else
	{
		return $file->img_url;
	}
	
}

function get_readable_date($date)
{
	setlocale(LC_ALL, 'turkish');	
	return iconv('latin5','utf-8',strftime(' %d %B %Y %A ',strtotime($date)));
}

function get_active_user()
{
	$ci = &get_instance();
	$user = $ci->session->userdata("user");

	if($user)
	{
		return $user;
	}
	else
	{
		return false;
	}
}

function send_email($toEmail,$subject,$message)
{
	$ci = &get_instance();
	$ci->load->model("emailsetting_model");
	$email_setting = $this->emailsetting_model->get(
		array(
			'isActive' => 1,

		)
	);

	$config = array(
		"protocol"	=> $email_setting->protocol,
		"smtp_host"	=> $email_setting->host,	
		"smtp_port"	=> $email_setting->port,	
		"smtp_user"	=> $email_setting->user,	
		"smtp_pass"	=> $email_setting->password,	
		"starttls"	=> true,	
		"charset"	=> "utf-8",	
		"mailtype"	=> "html",	
		"wordwrap"	=> true,
		"newline"   => "\r\n"
	);
	$this->load->library("email",$config);
	$this->email->from($email_setting->from,$email_setting->user_name);
	$this->email->to($toEmail);
	$this->email->subject($subject);
	$this->email->message($message);
	
	return $this->email->send();
}