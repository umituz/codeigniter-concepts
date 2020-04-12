<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icerik_Yorumlar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("back/ayar/genel_ayar");
		$this->load->model("back/icerik_yorum");
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
		$viewData->rows = $this->icerik_yorum->get_all(array(),"sira ASC","*");
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/icerik_yorumlar',$viewData);
	}

	public function ekle()
	{
		$viewData = new stdClass();
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/icerik/ekle',$viewData);	
	}

	public function duzenle($id)
	{
		$viewData = new stdClass();
		$viewData->row = $this->icerik->get(array("id" => $id));
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/icerik/duzenle',$viewData);
	}

	public function add(){
		
		$config["upload_path"]		= "uploads/images/icerikler/";
		$config["allowed_types"]	= "gif|jpg|png";
		$config["encrypt_name"]		= true;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('resim_konumu')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('404',$error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$resim_ad = $data["upload_data"]["file_name"];
			$resim_konumu = "uploads/images/icerikler/$resim_ad";

			$baslik   = $this->input->post("baslik");
			$seo = seo($baslik);
			$etiketler = $this->input->post("etiketler");
			$detay = $this->input->post("detay");
			$sira = $this->input->post("sira");

			$data = array(
			"resim_konumu" => $resim_konumu,
			"baslik" => $baslik,
			"seo" => $seo,
			"etiketler" => $etiketler,
			"detay" => $detay,
			"sira" => $sira
			);

			$insert = $this->icerik->add($data);
			if($insert){
				redirect("admin/icerikler");
			}else{
				redirect("admin/icerikler");
			}
		}
	}

	public function edit($id){
		$baslik   = $this->input->post("baslik");
		$seo = seo($baslik);
		$etiketler = $this->input->post("etiketler");
		$detay = $this->input->post("detay");
		$sira = $this->input->post("sira");

		$data = array(
			"baslik" => $baslik,
			"seo" => $seo,
			"etiketler" => $etiketler,
			"detay" => $detay,
			"sira" => $sira
		);

		$update = $this->icerik->update(array("id"=>$id),$data);
		if($update){
			redirect("admin/icerikler");
		}else{
			redirect("admin/icerikler/duzenle/$id");
		}
	}

	public function delete($id){
		$image = $this->icerik->get(array("id" => $id));	
		$file_path = FCPATH."$image->resim_konumu";
		if(unlink($file_path)){
			$delete = $this->icerik->delete(array("id" => $id));
			if($delete){
				redirect("admin/icerikler");
			}else{
				redirect("admin/icerikler");
			}
		}
		
	}

	public function sirala(){
		parse_str($this->input->post("data"),$data);
		$items = $data['siralamaID'];
		foreach($items as $rank => $id){
			$this->icerik->update(
				array(
					"id" => $id,
					"sira !=" => $rank
				),
				array("sira" => $rank)
			);
		}
	}

}
