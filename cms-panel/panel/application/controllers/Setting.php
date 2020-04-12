<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "setting";
		$this->load->model('setting_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$item = $this->setting_model->get();
		$viewData = new stdClass();

		if($item)
		{
			$viewData->subViewFolder = "update";
		}
		else
		{
			$viewData->subViewFolder = "no_content";
		}

		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function new_form()
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function save()
	{
		$this->load->library('form_validation');
		
		if ($_FILES["logo"]["name"] === "")
		{
			$alert = array(
				"title"		=> "Başarısız", 
				"message" 	=> "Resim Seçmek Zorundasınız",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("setting/new_form"));
			die;
		}

		$this->form_validation->set_rules("company_name","Şirket Adı","required|trim");
		$this->form_validation->set_rules("phone_1","Telefon 1","required|trim");
		$this->form_validation->set_rules("email","E-mail Adresi","required|trim|valid_email");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email" => "Lütfen geçerli bir e-posta adresi giriniz!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$file_name = convertToSEO(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

			$image_150x35 = upload_picture($_FILES["logo"]["tmp_name"],"uploads/$this->viewFolder",150,35,$file_name);

			if($image_150x35)
			{
				$data = array(
					"company_name" 	=> $this->input->post("company_name"),
					"phone_1"		=> $this->input->post("phone_1"),
					"phone_2"		=> $this->input->post("phone_2"),
					"fax_1"			=> $this->input->post("fax_1"),
					"fax_2"			=> $this->input->post("fax_2"),
					"address"		=> $this->input->post("address"),
					"about_us"		=> $this->input->post("about_us"),
					"mission"		=> $this->input->post("mission"),
					"vision"		=> $this->input->post("vision"),
					"email"			=> $this->input->post("email"),
					"facebook"		=> $this->input->post("facebook"),
					"twitter"		=> $this->input->post("twitter"),
					"instagram"		=> $this->input->post("instagram"),
					"linkedin"		=> $this->input->post("linkedin"),
					"logo"			=> $file_name,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				);
				$insert = $this->setting_model->add($data);

				if($insert)
				{
					$alert = array(
						"title"		=> "Başarılı",
						"message"   => "Kayıt başarılı bir şekilde eklendi",
						"type" 		=> "success"
					);
				}
				else
				{
					$alert = array(
						"title"		=> "Başarısız", 
						"message" 	=> "Kayıt eklenirken bir hata oluştu",
						"type" 		=> "error"
					);
				}

			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Görsel Yüklenirken Bir Sorun Oluştu",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert",$alert);
				redirect(base_url("setting/new_form"));
			}

			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("setting"));
			
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function update_form($id)
	{
		$item = $this->setting_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules("company_name","Şirket Adı","required|trim");
		$this->form_validation->set_rules("phone_1","Telefon 1","required|trim");
		$this->form_validation->set_rules("email","E-mail Adresi","required|trim|valid_email");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email" => "Lütfen geçerli bir e-posta adresi giriniz!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			if($_FILES["logo"]["name"] !== "")
			{
				$file_name = convertToSEO(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

				$image_150x35 = upload_picture($_FILES["logo"]["tmp_name"],"uploads/$this->viewFolder",150,35,$file_name);

				if($image_150x35)
				{
					$fileName = getImageFileName("setting_model",$id);
					unlink("uploads/{$this->viewFolder}/150x35{$fileName}");
					$data = array(
						"company_name" 	=> $this->input->post("company_name"),
						"phone_1"		=> $this->input->post("phone_1"),
						"phone_2"		=> $this->input->post("phone_2"),
						"fax_1"			=> $this->input->post("fax_1"),
						"fax_2"			=> $this->input->post("fax_2"),
						"address"		=> $this->input->post("address"),
						"about_us"		=> $this->input->post("about_us"),
						"mission"		=> $this->input->post("mission"),
						"vision"		=> $this->input->post("vision"),
						"email"			=> $this->input->post("email"),
						"facebook"		=> $this->input->post("facebook"),
						"twitter"		=> $this->input->post("twitter"),
						"instagram"		=> $this->input->post("instagram"),
						"linkedin"		=> $this->input->post("linkedin"),
						"logo"			=> $file_name,
						"updatedAt" 	=> date("Y-m-d H:i:s") 
					);
				}
				else
				{
					$alert = array(
						"title"		=> "Başarısız", 
						"message" 	=> "Görsel Yüklenirken Bir Sorun Oluştu",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("setting/update_form/{$id}"));
				}
			}else{

				$data = array(
					"company_name" 	=> $this->input->post("company_name"),
					"phone_1"		=> $this->input->post("phone_1"),
					"phone_2"		=> $this->input->post("phone_2"),
					"fax_1"			=> $this->input->post("fax_1"),
					"fax_2"			=> $this->input->post("fax_2"),
					"address"		=> $this->input->post("address"),
					"about_us"		=> $this->input->post("about_us"),
					"mission"		=> $this->input->post("mission"),
					"vision"		=> $this->input->post("vision"),
					"email"			=> $this->input->post("email"),
					"facebook"		=> $this->input->post("facebook"),
					"twitter"		=> $this->input->post("twitter"),
					"instagram"		=> $this->input->post("instagram"),
					"linkedin"		=> $this->input->post("linkedin"),
					"createdAt" 	=> date("Y-m-d H:i:s") 
				);
			}


			$update = $this->setting_model->update(
				array("id" => $id),
				$data);

			if($update)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Kayıt başarılı bir şekilde güncellendi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Kayıt güncellenirken bir hata oluştu",
					"type" 		=> "error"
				);
			}

			$settings = $this->setting_model->get();
			$this->session->set_userdata("settings",$settings);

			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("setting"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->setting_model->get(array('id' => $id));

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

}