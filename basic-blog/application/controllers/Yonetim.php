<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yonetim extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('kontrol')){
			redirect('admin/panel');
		}else{
			$this->load->view('back/pages/giris');
		}
	}

	public function giris(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kullanici_ad','Kullanıcı Adı','required|trim');
		$this->form_validation->set_rules('sifre','Şifre','required|trim');
		$this->form_validation->set_message('required','<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <b>%s</b> Boş Bırakılamaz!
                            </div>');
		if($this->form_validation->run()){
			$kullanici_ad = $this->input->post('kullanici_ad');
			$sifre 		  = $this->input->post('sifre');
			
			$data = array(
				"kullanici_ad" => $kullanici_ad,
				"sifre" => $sifre
			);
			$this->load->model("back/uye");
			$sonuc=$this->uye->get($data);
			if($sonuc){
				$this->session->set_userdata('kontrol',true);
				$this->session->set_userdata('info',$sonuc);
				redirect("admin/panel");
			}else{
				$this->session->set_flashdata('hata','<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Kullanıcı adı ya da şifre hatalı!
                            </div>');
				redirect('yonetim');
			}
		}else{
			$this->load->view('back/pages/giris');
		}
	}

	public function cikis(){
		$this->session->sess_destroy();
		$this->load->view("back/pages/giris");
	}

}
