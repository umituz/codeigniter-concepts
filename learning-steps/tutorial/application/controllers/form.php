<?php 

class form extends CI_Controller{
	public function index(){
		echo base_url();
		$this->load->view("form");
	}
	public function kaydet(){
		$isim = $this->input->get('isim');
		$email = $this->input->get('email');
		$cinsiyet = $this->input->get('cinsiyet');
		echo "Adınız {$isim} ve emailiniz {$email} ve de cinsiyetiniz {$cinsiyet}";
	}
}

 ?>