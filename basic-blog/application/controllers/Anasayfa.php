<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller {

	public function index()
	{
		$this->load->model("back/icerik");
		$this->load->model("back/icerik_kategori");
		$viewData = new stdClass();
		$viewData->rows = $this->icerik->get_all(array(),"sira DESC","*");
		$viewData->kategoriler = $this->icerik_kategori->get_all(array(),"sira DESC","*");
		$this->load->view('front/anasayfa',$viewData);
	}

	public function makale($seo){
		$this->load->model('back/icerik');
		$sonuc = $this->icerik->makale($seo);
		$viewData['row'] = $sonuc;
		$this->load->view('front/makale',$viewData);
	}

	public function iletisim(){
		$this->load->view('front/iletisim');
	}

	public function mesajgonder(){
	
		$adsoyad = $this->input->post('adsoyad');
		$email   = $this->input->post('email');
		$telefon = $this->input->post('telefon');
		$mesaj   = $this->input->post('mesaj');

		$data = array(
			'adsoyad' =>$adsoyad,
			'email'   =>$email,
			'telefon' =>$telefon,
			'mesaj'   =>$mesaj  
		);

		$this->load->model('front/mesaj');
		$insert = $this->mesaj->add($data);
		if($insert){
			$this->session->set_flashdata('bilgi','<h2>Mesajınız Tarafımıza İletilmiştir. Teşekkürler!</h2>');
			redirect('iletisim');
		}

	}
} 
