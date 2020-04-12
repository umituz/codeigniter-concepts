<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailSetting extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "email_setting";
		$this->load->model('emailsetting_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->emailsetting_model->get_all(
			array()
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
			
		$this->form_validation->set_rules("protocol","Protokol","required|trim");
		$this->form_validation->set_rules("host","E-posta Sunucu Bilgisi","required|trim");
		$this->form_validation->set_rules("port","Port Numarası","required|trim");
		$this->form_validation->set_rules("user_name","E-posta Başlık","required|trim");
		$this->form_validation->set_rules("user","E-posta (User)","required|trim|valid_email");
		$this->form_validation->set_rules("from","Kimden Gidecek (From)","required|trim|valid_email");
		$this->form_validation->set_rules("to","Kime Gidecek (To)","required|trim|valid_email");
		$this->form_validation->set_rules("password","Şifre","required|trim");
		
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email"	=> "Lütfen geçerli bir e-posta adresi giriniz"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$insert = $this->emailsetting_model->add(
				array(
					"protocol" 		=> $this->input->post("protocol"),
					"host" 			=> $this->input->post("host"),
					"port" 			=> $this->input->post("port"),
					"user_name" 	=> $this->input->post("user_name"),
					"user"     		=> $this->input->post("user"),
					"from"     		=> $this->input->post("from"),
					"to"     		=> $this->input->post("to"),
					"password"		=> $this->input->post("password"),
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
			redirect(base_url("emailsetting"));	
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
		$item = $this->emailsetting_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id)
	{
		
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules("protocol","Protokol","required|trim");
		$this->form_validation->set_rules("host","E-posta Sunucu Bilgisi","required|trim");
		$this->form_validation->set_rules("port","Port Numarası","required|trim");
		$this->form_validation->set_rules("user_name","E-posta Başlık","required|trim");
		$this->form_validation->set_rules("user","E-posta (User)","required|trim|valid_email");
		$this->form_validation->set_rules("from","Kimden Gidecek (From)","required|trim|valid_email");
		$this->form_validation->set_rules("to","Kime Gidecek (To)","required|trim|valid_email");
		$this->form_validation->set_rules("password","Şifre","required|trim");
		
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email"	=> "Lütfen geçerli bir e-posta adresi giriniz"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$update = $this->emailsetting_model->update(
				array("id" => $id),
				array(
					"protocol" 		=> $this->input->post("protocol"),
					"host" 			=> $this->input->post("host"),
					"port" 			=> $this->input->post("port"),
					"user_name" 	=> $this->input->post("user_name"),
					"user"     		=> $this->input->post("user"),
					"from"     		=> $this->input->post("from"),
					"to"     		=> $this->input->post("to"),
					"password"		=> $this->input->post("password")
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
			redirect(base_url("emailsetting"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->emailsetting_model->get(array('id' => $id));

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$fileName = getImageFileName("emailsetting_model",$id);
		unlink("uploads/{$this->viewFolder}/{$fileName}");
		$delete = $this->emailsetting_model->delete(array('id' =>$id));
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
		redirect(base_url("emailsetting"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->emailsetting_model->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}

	}

}