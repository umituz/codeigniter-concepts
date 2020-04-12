<?php 

class session extends CI_Controller{
	public function index(){
		
	}
	public function set_session($name = ""){
		$list=$this->session->userdata("personel_listesi");
		array_push($list, $name);
		$this->session->set_userdata("personel_listesi",$name);
		$this->get_session();
	}
	public function get_session(){
		print_r($this->session->userdata("personel_listesi"));
	}
}

 ?>