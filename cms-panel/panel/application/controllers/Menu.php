<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "menu";
		$this->load->model('menu_model');
		$this->load->model('page_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$viewData = new stdClass();

		$viewData->viewFolder 	 = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->menus 		 = $this->menu_model->get_all(array("top" => 0),"rank ASC");

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function new_form()
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$viewData->pages 		 = $this->page_model->get_all(array("isActive" => 1));

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function save()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules("title","Menü Adı","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$data = array(
				"title" 		=> $this->input->post("title"),
				"type" 			=> $this->input->post("type"),
				"url" 			=> convertToSEO($this->input->post("title")),
				"rank"			=> 0,
				"isActive"  	=> 1,
				"createdAt" 	=> date("Y-m-d H:i:s") 
			);

			if($this->input->post("type") == "1"){
				$data["link"] =  $this->input->post("another_site");
			}else if($this->input->post("type") == "2"){
				$data["link"] =  $this->input->post("choose_page");
			}

			$insert = $this->menu_model->add($data);

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
			redirect(base_url("menu"));
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
		$item = $this->menu_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder 	 = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item 		 = $item;
		$viewData->menus 		 = $this->menu_model->get_all(array(),"rank ASC");

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules("title","Menü Adı","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			
			$data = array(
				"top" 			=> $this->input->post("top"),
				"title" 		=> $this->input->post("title"),
				"url" 			=> convertToSEO($this->input->post("title")),
			);
			


			$update = $this->menu_model->update(
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
			redirect(base_url("menu"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder 	 = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error 	 = true;
			$viewData->item 		 = $this->menu_model->get(array('id' => $id));
			$viewData->menus 		 = $this->menu_model->get_all(array(),"rank ASC");

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$fileName = getImageFileName("menu_model",$id);
		unlink("uploads/{$this->viewFolder}/{$fileName}");
		$delete = $this->menu_model->delete(array('id' =>$id));
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
		redirect(base_url("menu"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->menu_model->update(
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
			$this->menu_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

}