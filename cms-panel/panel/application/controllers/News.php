<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "news";
		$this->load->model('news_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->news_model->get_all(array(),"rank ASC");
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
		$news_type = $this->input->post("news_type");
		if($news_type == "image")
		{
			if ($_FILES["img_url"]["name"] === "")
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Resim Seçmek Zorundasınız",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert",$alert);
				redirect(base_url("news/new_form"));
			}
			
		}
		else if($news_type == "video")
		{
			$this->form_validation->set_rules("video_url","Video Link","required|trim");
		}
		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			if($news_type == "image")
			{
				$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

				$image_513x289 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",513,289,$file_name);
				$image_730x411 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",730,411,$file_name);

				if($image_513x289 && $image_730x411)
				{
					$data = array(
						"title" 		=> $this->input->post("title"),
						"description"   => $this->input->post("description"),
						"url" 			=> convertToSEO($this->input->post("title")),
						"news_type"		=> $news_type,
						"img_url"		=> $file_name,
						"video_url"		=> "#",
						"isActive"  	=> 1,
						"createdAt" 	=> date("Y-m-d H:i:s") 
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
					redirect(base_url("news/new_form"));
				}
			}
			else if($news_type == "video")
			{
				$data = array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"news_type"		=> $news_type,
					"img_url"		=> "#",
					"video_url"		=> $this->input->post("video_url"),
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				);
			}


			$insert = $this->news_model->add($data);

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
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("news"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;
			$viewData->news_type = $news_type;

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function update_form($id)
	{
		$item = $this->news_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$news_type = $this->input->post("news_type");

		if($news_type == "video")
		{
			$this->form_validation->set_rules("video_url","Video Link","required|trim");
		}

		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			if($news_type == "image")
			{
				if($_FILES["img_url"]["name"] !== "")
				{
					$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

					$image_513x289 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",513,289,$file_name);
					$image_730x411 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",730,411,$file_name);

					if($image_513x289 && $image_730x411)
					{
						$fileName = getImageFileName("news_model",$id);
						unlink("uploads/{$this->viewFolder}/513x289/{$fileName}");
						unlink("uploads/{$this->viewFolder}/730x411/{$fileName}");
						$data = array(
							"title" 		=> $this->input->post("title"),
							"description"   => $this->input->post("description"),
							"url" 			=> convertToSEO($this->input->post("title")),
							"news_type"		=> $news_type,
							"img_url"		=> $file_name,
							"video_url"		=> "#"
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
						redirect(base_url("news/update_form/{$id}"));
					}
				}else{
					$data = array(
						"title" 		=> $this->input->post("title"),
						"description"   => $this->input->post("description"),
						"url" 			=> convertToSEO($this->input->post("title")),
					);
				}
			}
			else if($news_type == "video")
			{
				$data = array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"news_type"		=> $news_type,
					"img_url"		=> "#",
					"video_url"		=> $this->input->post("video_url"),
				);
			}


			$update = $this->news_model->update(
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
			redirect(base_url("news"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->news_type = $news_type;
			$viewData->item = $this->news_model->get(array('id' => $id));

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$fileName = getImageFileName("news_model",$id);
		unlink("uploads/{$this->viewFolder}/513x289/{$fileName}");
		unlink("uploads/{$this->viewFolder}/730x411/{$fileName}");
		$delete = $this->news_model->delete(array('id' =>$id));
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
		redirect(base_url("news"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->news_model->update(
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
			$this->news_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

}