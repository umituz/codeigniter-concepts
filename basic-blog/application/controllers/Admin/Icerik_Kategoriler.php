<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icerik_Kategoriler extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("back/ayar/genel_ayar");
		$this->load->model("back/icerik_kategori");
		$this->load->model("back/icerik");
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
		$viewData->rows = $this->icerik_kategori->get_all(array(),"sira ASC","*");
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/icerik_kategoriler',$viewData);
	}

	public function ekle()
	{
		$viewData = new stdClass();
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/icerik_kategori/ekle',$viewData);	
	}

	public function duzenle($id)
	{
		$viewData = new stdClass();
		$viewData->row = $this->icerik_kategori->get(array("id" => $id));
		$viewData->genel_ayar = $this->genel_ayar->get(array("id" => 0));
		$this->load->view('back/icerik_kategori/duzenle',$viewData);
	}

	public function add(){
		$kategori_ad   = $this->input->post("kategori_ad");
		$seo = seo($kategori_ad);
		$sira = $this->input->post("sira");

		$data = array(
		"kategori_ad" => $kategori_ad,
		"kategori_seo" => $seo,
		"sira" => $sira
		);

		$insert = $this->icerik_kategori->add($data);
		if($insert){
			redirect("admin/icerik_kategoriler");
		}else{
			redirect("admin/icerik_kategoriler");
			}
	}

	public function edit($id){
		$kategori_ad   = $this->input->post("kategori_ad");
		$kategori_seo = seo($kategori_ad);
		$sira = $this->input->post("sira");

		$data = array(
			"kategori_ad" => $kategori_ad,
			"kategori_seo" => $kategori_seo,
			"sira" => $sira
		);
		
		$array = array('kategori' => $kategori_ad);
		$kategori_ad = kategori_ad($id);
		$icerik_kategori_guncelle = $this->icerik->icerik_kategori_guncelle($kategori_ad,$array);
		
		$update = $this->icerik_kategori->update(array("id"=>$id),$data);

		if($update){
			redirect("admin/icerik_kategoriler");
		}else{
			redirect("admin/icerik_kategoriler/duzenle/$id");
		}
	}

	public function delete($id){
		$delete = $this->icerik_kategori->delete(array("id" => $id));
		if($delete){
			redirect("admin/icerik_kategoriler");
		}else{
			redirect("admin/icerik_kategoriler");
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
