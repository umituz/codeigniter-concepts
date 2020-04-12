<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("back/ayar/genel_ayar");
		{
			$this->guvenlik();
		}
	}	

	function guvenlik(){
		$kontrol = $this->session->userdata('kontrol');

		if(!isset($kontrol) || $kontrol != true){
			redirect('yonetim');
		}
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/anasayfa',$viewData);
	}
	
}
