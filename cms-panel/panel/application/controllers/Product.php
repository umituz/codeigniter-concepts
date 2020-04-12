<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "product";
		$this->load->model('product_model');
		$this->load->model('product_image_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->product_model->get_all(
			array(),
			"rank ASC"
		);
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
		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$insert = $this->product_model->add(
				array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				)
			);

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
			redirect(base_url("product"));
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
		$item = $this->product_model->get(array('id' => $id));
		
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
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$update = $this->product_model->update(
				array('id' => $id),
				array(
					"title" 		=> $this->input->post("title"),
					"description"   => $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title"))
				)
			);

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
			redirect(base_url("product"));
		}
		else
		{
			$item = $this->product_model->get(array('id' => $id));
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;



			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$delete = $this->product_model->delete(array('id' =>$id));
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
		redirect(base_url("product"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->product_model->update(
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
			$this->product_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

	public function image_form($id)
	{

		$viewData = new stdClass();

		$viewData->viewFolder 	 = $this->viewFolder;
		$viewData->subViewFolder = "image";
		$viewData->item 		 = $this->product_model->get(array("id" => $id));
		$viewData->item_images 	 = $this->product_image_model->get_all(array("product_id" => $id),"rank ASC");

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function image_upload($id)
	{
		$file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		$image_348x215 = upload_picture($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder",348,215,$file_name);
		$image_1080x426 = upload_picture($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder",1080,426,$file_name);

		if($image_348x215 && $image_1080x426)
		{
			$this->product_image_model->add(
				array(
					"product_id" 	=> $id,
					"img_url" 		=> $file_name,
					"rank"    		=> 0,
					"isActive"  	=> 1,
					"isCover"  		=> 0,
					"createdAt" 	=> date("Y-m-d H:i:s")
				),
				"rank ASC"
			);
		}
		else
		{
			echo "resim yüklenemdi";
		}

	}

	public function refresh_image_list($id)
	{
		$viewData = new stdClass();

		$viewData->viewFolder 	 = $this->viewFolder;
		$viewData->subViewFolder = "image";
		$viewData->item_images 	 = $this->product_image_model->get_all(array("product_id" => $id));

		$render_html = $this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list",$viewData,true);
		echo $render_html;
	}

	public function isCoverSetter($id,$parent_id)
	{
		if($id && $parent_id)
		{
			$isCover = ($this->input->post("data") === "true") ? 1 : 0;
			$this->product_image_model->update(
				array("id" => $id,"product_id" => $parent_id),
				array("isCover" => $isCover)
			);
			$this->product_image_model->update(
				array("id !=" => $id,"product_id" => $parent_id),
				array("isCover" => 0)
			);

			$viewData = new stdClass();

			$viewData->viewFolder 	 = $this->viewFolder;
			$viewData->subViewFolder = "image";
			$viewData->item_images 	 = $this->product_image_model->get_all(array("product_id" => $parent_id),"rank ASC");

			$render_html = $this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list",$viewData,true);
			echo $render_html;

		}

	}

	public function imageIsActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			echo $isActive;
			$this->product_image_model->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}
	}

	public function imageRankSetter()
	{
		$data = $this->input->post("data");

		parse_str($data,$order);
		$items = $order["order"];
		
		foreach ($items as $rank => $id) {
			$this->product_image_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

	public function imageDelete($id,$parent_id)
	{
		$fileName = getImageFileName("product_image_model",$id);
		
		$delete = $this->product_image_model->delete(array('id' =>$id));
		if($delete)
		{
			unlink("uploads/{$this->viewFolder}/348x215/{$fileName}");
			unlink("uploads/{$this->viewFolder}/1080x426/{$fileName}");
			redirect(base_url("product/image_form/{$parent_id}"));
		}
		else
		{
			redirect(base_url("product/image_form/{$parent_id}"));
		}

	}
}