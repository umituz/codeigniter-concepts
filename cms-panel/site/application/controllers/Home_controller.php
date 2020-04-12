<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public $view_folder = "";

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("text");
	}

	public function index()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "home_view";
		$this->load->model("slider_model");
		$viewData->sliders = $this->slider_model->get_all(
			array("isActive" => 1),
			"rank ASC"
		);

		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function page($menu_id)
	{
		$this->load->model("menu_model");
		$menu = $this->menu_model->get(array("id" => $menu_id));
		if($menu && $menu->type == 2){
			$this->load->model("page_model");
			$menu = $this->page_model->get(array("id" => $menu->link));
			if($sayfa){
				$viewData["sayfa"] = $sayfa;
				$this->load->view("page/index",$viewData);
			}
		}else if($menu && $menu->type == 1){
			header("Location: $menu->link");
		}
	}

	public function product_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "product_view";
		$this->load->model("product_model");
		
		$viewData->products = $this->product_model->get_all(
			array(
				'isActive' => 1
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function product_detail($url = "")
	{
		$viewData = new stdClass;
		$viewData->view_folder = "product_view/detail";
		$this->load->model("product_model");
		$this->load->model("product_image_model");
		$viewData->product = $this->product_model->get(
			array(
				'isActive' => 1,
				'url' => $url
			)
		);
		$viewData->product_images = $this->product_image_model->get_all(
			array(
				'isActive' => 1,
				'product_id' => $viewData->product->id
			),
			"rank ASC"
		);
		$viewData->other_products = $this->product_model->get_all(
			array(
				'isActive'  => 1,
				"id !="		=> $viewData->product->id
			),
			'rand()',
			array("start" => 0, "count" => 3)
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function portfolio_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "portfolio_view";
		$this->load->model("portfolio_model");
		
		$viewData->portfolios = $this->portfolio_model->get_all(
			array(
				'isActive' => 1
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function portfolio_detail($url = "")
	{
		$viewData = new stdClass;
		$viewData->view_folder = "portfolio_view/detail";
		$this->load->model("portfolio_model");
		$this->load->model("portfolio_image_model");
		$viewData->portfolio = $this->portfolio_model->get(
			array(
				'isActive' => 1,
				'url' => $url
			)
		);

		$viewData->portfolio_images = $this->portfolio_image_model->get_all(
			array(
				'isActive' => 1,
				'portfolio_id' => $viewData->portfolio->id
			),
			"rank ASC"
		);


		$viewData->other_portfolios = $this->portfolio_model->get_all(
			array(
				'isActive'  => 1,
				"id !="		=> $viewData->portfolio->id
			),
			'rand()',
			array("start" => 0, "count" => 3)
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function course_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "course_view";
		$this->load->model("course_model");
		
		$viewData->courses = $this->course_model->get_all(
			array(
				'isActive' => 1
			),'event_date ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function course_detail($url = "")
	{
		$viewData = new stdClass;
		$viewData->view_folder = "course_view/detail";
		$this->load->model("course_model");
		$viewData->course = $this->course_model->get(
			array(
				'isActive' => 1,
				'url' => $url
			)
		);

		$viewData->other_courses = $this->course_model->get_all(
			array(
				'isActive'  => 1,
				"id !="		=> $viewData->course->id
			),
			'rand()',
			array("start" => 0, "count" => 3)
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function reference_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "reference_view";
		$this->load->model("reference_model");
		
		$viewData->references = $this->reference_model->get_all(
			array(
				'isActive' => 1
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function brand_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "brand_view";
		$this->load->model("brand_model");
		
		$viewData->brands = $this->brand_model->get_all(
			array(
				'isActive' => 1
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function service_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "service_view";
		$this->load->model("service_model");
		
		$viewData->services = $this->service_model->get_all(
			array(
				'isActive' => 1
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function about_us()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "about_view";
		$this->load->model("setting_model");
		$viewData->setting = $this->setting_model->get();
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function contact()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "contact_view";

		$this->load->helper("captcha");

		$config = array(
			"word"          => '',
			"img_path"      => 'captcha/',
			"img_url"       => base_url("captcha"),
			"font_path"     => 'fonts/corbel.ttf',
			"img_width"     => 150,
			"img_height"    => 50,
			"expiration"    => 7200,
			"word_length"   => 5,
			"font_size"     => 20,
			"img_id"        => "captcha_img",
			"pool"          => "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",
			"colors"        => array(
				'background' => array(56,255,45),
				'border'     => array(255,255,255),
				'text'       => array(0,0,0),
				'grid'       => array(255,40,40)
			)

		);

		$viewData->captcha = create_captcha($config);
		$this->session->set_userdata("captcha",$viewData->captcha["word"]);


		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function send_contact_message()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","Ad Soyad","required|trim");
		$this->form_validation->set_rules("email","E-posta","required|trim|valid_email");
		$this->form_validation->set_rules("subject","Konu","required|trim");
		$this->form_validation->set_rules("message","Konu","required|trim");
		$this->form_validation->set_rules("captcha","Doğrulama Kodu","required|trim");

		if($this->form_validation->run() === FALSE){
			// todo alert
			redirect(base_url("iletisim"));
		}else{
			if($this->session->userdata("capctha") == $this->input->post("captcha")){
				// Email Gönder
			}else{
				// todo alert
			}
		}

	}

	public function news_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "news_view";
		$this->load->model("news_model");
		
		$viewData->news_list = $this->news_model->get_all(
			array(
				'isActive' => 1
			),'rank DESC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);
	}

	public function news_detail($url)
	{
		if($url !== ""){
			$viewData = new stdClass;
			$viewData->view_folder = "news_view/detail";
			$this->load->model("news_model");

			$news = $this->news_model->get(
				array(
					'isActive' 	=> 1,
					"url"		=> $url
				),'rank ASC'
			);

			if($news){
				$viewData->news 			 = $news;
				$viewCount 					 = $news->viewCount + 1;
				$viewData->recents_news_list = $this->news_model->get_all(
					array(
						'isActive' 	=> 1,
						'id !='		=> $news->id
					),'rank DESC', array(
						"count"		=> 5,
						"start"		=> 0
					)
				);

				$this->news_model->update(
					array("id" => $news->id),
					array("viewCount"	=> ++$news->viewCount)
				);

				$viewData->news->viewCount = $viewCount;

				$this->load->view("{$viewData->view_folder}/index",$viewData);
			}



		}
	}

	public function image_gallery_list()
	{
		$viewData = new stdClass;
		$viewData->view_folder = "gallery_view/image_gallery";
		$this->load->model("gallery_model");
		
		$viewData->galleries = $this->gallery_model->get_all(
			array(
				'isActive' 		=> 1,
				'gallery_type'	=> 'image'
			),'rank ASC'
		);

		$this->load->view("{$viewData->view_folder}/index",$viewData);		
	}

	public function image_gallery_detail($gallery_url = "")
	{
		if($gallery_url){
			$viewData = new stdClass;
			$viewData->view_folder = "gallery_view/image_gallery/detail";
			$viewData->gallery = get_gallery_by_url($gallery_url);
			$this->load->model("gallery_image_model");

			$viewData->images = $this->gallery_image_model->get_all(
				array(
					'isActive' 		=> 1,
					'gallery_id'	=> $viewData->gallery->id
				),'rank ASC'
			);
			$this->load->view("{$viewData->view_folder}/index",$viewData);		
		}
		
	}

	public function video_gallery_list(){
		$viewData = new stdClass;
		$viewData->view_folder = "gallery_view/video_gallery";
		$this->load->model("gallery_model");
		
		$viewData->galleries = $this->gallery_model->get_all(
			array(
				'isActive' 		=> 1,
				'gallery_type'	=> 'video'
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);	
	}

	public function video_gallery_detail($gallery_url = ""){
		if($gallery_url){
			$viewData = new stdClass;
			$viewData->view_folder = "gallery_view/video_gallery/detail";
			$viewData->gallery = get_gallery_by_url($gallery_url);
			$this->load->model("gallery_video_model");

			$viewData->videos = $this->gallery_video_model->get_all(
				array(
					'isActive' 		=> 1,
					'gallery_id'	=> $viewData->gallery->id
				),'rank ASC'
			);

			$this->load->view("{$viewData->view_folder}/index",$viewData);		
		}
	}

	public function file_gallery_list(){
		$viewData = new stdClass;
		$viewData->view_folder = "gallery_view/file_gallery";
		$this->load->model("gallery_model");
		
		$viewData->galleries = $this->gallery_model->get_all(
			array(
				'isActive' 		=> 1,
				'gallery_type'	=> 'file'
			),'rank ASC'
		);
		$this->load->view("{$viewData->view_folder}/index",$viewData);	
	}

	public function file_gallery_detail($gallery_url = ""){
		if($gallery_url){
			$viewData = new stdClass;
			$viewData->view_folder = "gallery_view/file_gallery/detail";
			$viewData->gallery = get_gallery_by_url($gallery_url);
			$this->load->model("gallery_file_model");

			$viewData->files = $this->gallery_file_model->get_all(
				array(
					'isActive' 		=> 1,
					'gallery_id'	=> $viewData->gallery->id
				),'rank ASC'
			);

			$this->load->view("{$viewData->view_folder}/index",$viewData);		
		}
	}


}
