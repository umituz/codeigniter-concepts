<?php 

class personel extends CI_Controller{
	public function index(){
		$rows=$this->db->order_by("id","desc")->get("personel")->result();
		//$dataView = array("rows" => $rows);
		$viewData = new stdClass();
		$viewData->rows = $rows;
		$this->load->view("listeleme",$viewData);
	}
	public function updatePage(){
		$id = $this->uri->segment(3);
		$row = $this->db->where("id",$id)->get("personel")->row();
		$viewData = new stdClass();
		$viewData->row=$row;
		$this->load->view("duzenle",$viewData);
	}
	public function update($id){
		$title = $this->input->post("title");
		$detail = $this->input->post("detail");
		$data=array("title" => $title, "detail" => $detail);
		$update = $this->db->where("id",$id)->update("personel",$data);
		if($update){
			redirect(base_url("personel"));
		}else{
			echo "Güncelleme başarısız";
		}
	}
	public function insertPage(){
		$this->load->view("ekle");
	}
	public function insert(){
		$title = $this->input->post("title");
		$detail = $this->input->post("detail");
		$data = array("title" => $title, "detail" => $detail);
		$insert=$this->db->insert("personel",$data);
		if($insert){
			redirect(base_url("personel"));
		}else{
			echo "Kayıt başarısız";
		}
	}
	public function delete($id){
		$delete=$this
		->db
		->where("id",$id)
		->delete("personel");
		if($delete){
			redirect(base_url("personel"));
		}else{
			echo "Kayıt silinemedi";
		}
	}
	public function siralama(){
		$siralama=$this->input->post("siralama");
		$rows=$this->db->order_by($siralama,"asc")->get("personel")->result();
		//$dataView = array("rows" => $rows);
		$viewData = new stdClass();
		$viewData->rows = $rows;
		$this->load->view("listeleme",$viewData);
	}
	public function model(){
		
	}

}

 ?>