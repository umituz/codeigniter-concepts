<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "user";
		$this->load->model('user_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->user_model->get_all(
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
			
		$this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
		$this->form_validation->set_rules("full_name","Ad Soyad","required|trim");
		$this->form_validation->set_rules("email","E-posta Adresi","required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[16]");
		$this->form_validation->set_rules("re_password","Şifre Tekrar","required|trim|min_length[6]|max_length[16]|matches[password]");
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email"	=> "Lütfen geçerli bir e-posta adresi giriniz",
				"is_unique"		=> "<b>{field}</b> alanı daha önceden kullanılmış",
				"matches"		=> "Şifreler birbirini tutmuyor",
				"min_length" 	=> "%s: en az %s karakter olmalıdır",
				"max_length" 	=> "%s: en fazla %s karakter olmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$insert = $this->user_model->add(
				array(
					"user_name" 	=> $this->input->post("user_name"),
					"full_name"     => $this->input->post("full_name"),
					"email" 		=> $this->input->post("email"),
					"password"		=> md5($this->input->post("password")),
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
			redirect(base_url("user"));	
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
		$item = $this->user_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id)
	{
		$oldUser = $this->user_model->get(
			array(
				'id' => $id
			)
		);

		$this->load->library('form_validation');

		if($oldUser->user_name != $this->input->post("user_name"))
		{
			$this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
		}

		if($oldUser->email != $this->input->post("email"))
		{
			$this->form_validation->set_rules("email","E-posta Adresi","required|trim|valid_email|is_unique[users.email]");
		}			
		
		$this->form_validation->set_rules("full_name","Ad Soyad","required|trim");
		
		
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email"	=> "Lütfen geçerli bir e-posta adresi giriniz",
				"is_unique"		=> "<b>{field}</b> alanı daha önceden kullanılmış"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$update = $this->user_model->update(
				array("id" => $id),
				array(
					"user_name" 	=> $this->input->post("user_name"),
					"full_name"     => $this->input->post("full_name"),
					"email" 		=> $this->input->post("email"),
				));

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
			redirect(base_url("user"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->user_model->get(array('id' => $id));

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$fileName = getImageFileName("user_model",$id);
		unlink("uploads/{$this->viewFolder}/{$fileName}");
		$delete = $this->user_model->delete(array('id' =>$id));
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
		redirect(base_url("user"));

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->user_model->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}

	}

	public function update_password_form($id)
	{
		$item = $this->user_model->get(
			array('id' => $id)
		);
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "password";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update_password($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[16]");
		$this->form_validation->set_rules("re_password","Şifre Tekrar","required|trim|min_length[6]|max_length[16]|matches[password]");
		
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"matches"		=> "Şifreler birbirini tutmuyor",
				"min_length" 	=> "%s: en az %s karakter olmalıdır",
				"max_length" 	=> "%s: en fazla %s karakter olmalıdır"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$update = $this->user_model->update(
				array("id" => $id),
				array(
					"password" 		=> md5($this->input->post("password"))
				));

			if($update)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Şifreniz başarılı bir şekilde güncellendi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Şifreniz güncellenirken bir hata oluştu",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("user"));
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "password";
			$viewData->form_error = true;
			$viewData->item = $this->user_model->get(
				array('id' => $id)
			);

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

}