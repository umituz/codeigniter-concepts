<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserOperation extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "user";
		$this->load->model('user_model');
	}

	public function login()
	{
		if(get_active_user())
		{
			redirect(base_url());
		}
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "login";

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function do_login()
	{
		if(get_active_user())
		{
			redirect(base_url());
		}
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules("user_email","E-posta Adresi","required|trim|valid_email");
		$this->form_validation->set_rules("user_password","Şifre","required|trim|min_length[6]|max_length[16]");
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email"	=> "Lütfen geçerli bir e-posta adresi giriniz",
				"min_length" 	=> "<b>%s</b> en az %s karakter olmalıdır",
				"max_length" 	=> "<b>%s</b> en fazla %s karakter olmalıdır"
			)
		);

		if($this->form_validation->run() == FALSE)
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "login";
			$viewData->form_error = true;

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
		else
		{
			$user = $this->user_model->get(
				array(
					"email" 	=> $this->input->post("user_email"),
					"password"  => md5($this->input->post("user_password")),
					"isActive"  => 1
				)
			);

			if($user)
			{
				$alert = array(
					"title"		=> "Giriş Başarılı",
					"message"   => "Hoşgeldiniz, <b>{$user->full_name}</b>",
					"type" 		=> "success"
				);
				$this->session->set_userdata("user",$user);
				$this->session->set_flashdata("alert",$alert);
				redirect(base_url());
			}
			else
			{
				$alert = array(
					"title"		=> "İşlem Başarısız",
					"message"   => "Lütfen giriş bilgileriniz kontrol ediniz",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert",$alert);
				redirect(base_url("login"));
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("user");
		redirect(base_url("login"));
	}

	public function forget_password()
	{
		if(get_active_user())
		{
			redirect(base_url());
		}
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "forget_password";

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function reset_password()
	{
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules("email","E-posta Adresi","required|trim|valid_email");
		$this->form_validation->set_message(
			array(
				"required" 		=> "<b>{field}</b> alanını doldurmalısınız!",
				"valid_email"	=> "<b>Lütfen geçerli bir e-posta adresi giriniz</b>"
			)
		);

		if($this->form_validation->run() == FALSE)
		{	
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "forget_password";
			$viewData->form_error = true;

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
		else
		{
			$user = $this->user_model->get(
				array(
					"isActive"  => 1,
					"email"		=> $this->input->post('email')
				)
			);

			if($user)
			{
				$this->load->helper("string");
				$gecici_sifre = random_string();

				$send = send_email($user->email,"Şifremi Unuttum","Geçici Şifreniz {$gecici_sifre}");
				
				if($send)
				{
					$this->user_model->update(
						array(
							"id"	=> $user->id
						),
						array(
							"password" 	=> md5($gecici_sifre)
						)
					);
					
					$alert = array(
						"title"		=> "İşlem Başarılı",
						"message"   => "Şifreniz başarılı bir şekilde sıfırlandı. E-mail adresinizi kontrol ediniz",
						"type" 		=> "success"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("sifremi-unuttum"));
				}
				else
				{
					$alert = array(
						"title"		=> "İşlem Başarısız",
						"message"   => "E-posta gönderilemedi! Lütfen daha sonra tekrar deneyiniz",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("sifremi-unuttum"));
					die;
				}
			}
			else
			{
				$alert = array(
					"title"		=> "İşlem Başarısız",
					"message"   => "Böyle bir kullanıcı bulunamadı!",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert",$alert);
				redirect(base_url("sifremi-unuttum"));
			}
		}
	}




}