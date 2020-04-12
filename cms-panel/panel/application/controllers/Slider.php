<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "slider";
		$this->load->model('slider_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->slider_model->get_all(array(),"rank ASC");
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;

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
		
		if ($_FILES["img_url"]["name"] === "")
		{
			$alert = array(
				"title"		=> "Başarısız", 
				"message" 	=> "Resim Seçmek Zorundasınız",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("slider/new_form"));
		}

		$this->form_validation->set_rules("title","Slayt Adı","required|trim");
		
		if($this->input->post("allowButton") == "on")
		{
			$this->form_validation->set_rules("button_caption","Buton Başlığı","required|trim");
			$this->form_validation->set_rules("button_url","Buton URL Bilgisi","required|trim");
		}

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

			$image_1920x650 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",1920,650,$file_name);

			if($image_1920x650)
			{
				$data = array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"img_url"		=> $file_name,
					"allowButton"	=> ($this->input->post("allowButton") == "on") ? 1 : 0,
					"button_caption"=> $this->input->post("button_caption"),
					"button_url"	=> $this->input->post("button_url"),
					"rank"			=> 0,
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				);
				$insert = $this->slider_model->add($data);

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
				redirect(base_url("slider/new_form"));
			}

			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("slider"));
			
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
		$item = $this->slider_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules("title","Başlık","required|trim");

		if($this->input->post("allowButton") == "on")
		{
			$this->form_validation->set_rules("button_caption","Buton Başlığı","required|trim");
			$this->form_validation->set_rules("button_url","Buton URL Bilgisi","required|trim");
		}

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			if($_FILES["img_url"]["name"] !== "")
			{
				$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

				$config["allowed_types"] = "jpg|jpeg|png";
				$config["upload_path"]   = "uploads/$this->viewFolder/";
				$config["file_name"]     = $file_name;
				$this->load->library("upload",$config);

				$upload = $this->upload->do_upload("img_url");

				if($upload)
				{
					$fileName = getImageFileName("slider_model",$id);
					unlink("uploads/{$this->viewFolder}/{$fileName}");
					$data = array(
						"title" 		=> $this->input->post("title"),
						"description"   => $this->input->post("description"),
						"img_url"		=> $file_name,
						"allowButton"	=> ($this->input->post("allowButton") == "on") ? 1 : 0,
						"button_caption"=> $this->input->post("button_caption"),
						"button_url"	=> $this->input->post("button_url")
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
					redirect(base_url("slider/update_form/{$id}"));
				}
			}else{
				$data = array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"allowButton"	=> ($this->input->post("allowButton") == "on") ? 1 : 0,
					"button_caption"=> $this->input->post("button_caption"),
					"button_url"	=> $this->input->post("button_url")
				);
			}


			$update = $this->slider_model->update(
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
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("slider"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->slider_model->get(array('id' => $id));

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$fileName = getImageFileName("slider_model",$id);
		unlink("uploads/{$this->viewFolder}/{$fileName}");
		$delete = $this->slider_model->delete(array('id' =>$id));
		if($delete)
		{
			$alert = array(
				"title"		=> "Başarılı",
				"message"   => "Kayıt başarılı bir şekilde silindi",
				"type" 		=> "success"
			);
		}
		else
		{
			$alert = array(
				"title"		=> "Başarısız", 
				"message" 	=> "Kayıt silinirken bir hata oluştu",
				"type" 		=> "error"
			);
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("slider"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->slider_model->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}

	}

	public function rankSetter()
	{
		$data = $this->input->post("data");

		parse_str($data,$order);
		$items = $order["order"];
		foreach ($items as $rank => $id) {
			$this->slider_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

}