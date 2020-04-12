<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "course";
		$this->load->model('course_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->course_model->get_all(array(),"rank ASC");
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
			redirect(base_url("course/new_form"));
		}

		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_rules("event_date","Eğitim Tarihi","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

			$image_255x157 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",255,157,$file_name);
			$image_1140x705 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",1140,705,$file_name);

			if($image_255x157 && $image_1140x705)
			{
				$data = array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"img_url"		=> $file_name,
					"event_date"	=> $this->input->post("event_date"),
					"rank"			=> 0,
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				);
				$insert = $this->course_model->add($data);

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
				redirect(base_url("course/new_form"));
			}

			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("course"));
			
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
		$item = $this->course_model->get(array('id' => $id));
		
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
		$this->form_validation->set_rules("event_date","Eğitim Tarihi","required|trim");
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

				$image_255x157 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",255,157,$file_name);
				$image_1140x705 = upload_picture($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder",1140,705,$file_name);

				if($image_255x157 && $image_1140x705)
				{
					$fileName = getImageFileName("course_model",$id);
					unlink("uploads/{$this->viewFolder}/255x157/{$fileName}");
					unlink("uploads/{$this->viewFolder}/1140x705/{$fileName}");
					$data = array(
						"title" 		=> $this->input->post("title"),
						"description"   => $this->input->post("description"),
						"url" 			=> convertToSEO($this->input->post("title")),
						"img_url"		=> $file_name,
						"event_date"	=> $this->input->post("event_date"),
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
					redirect(base_url("course/update_form/{$id}"));
				}
			}
			else
			{
				$data = array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"event_date"   => $this->input->post("event_date")
				);
			}


			$update = $this->course_model->update(
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
			redirect(base_url("course"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->course_model->get(array('id' => $id));

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$fileName = getImageFileName("course_model",$id);
		unlink("uploads/{$this->viewFolder}/255x157/{$fileName}");
		unlink("uploads/{$this->viewFolder}/1140x705/{$fileName}");
		$delete = $this->course_model->delete(array('id' =>$id));
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
		redirect(base_url("course"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->course_model->update(
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
			$this->course_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

}