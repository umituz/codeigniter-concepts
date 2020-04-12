<?php 

class database extends CI_Controller
{
	public function index(){
		// Tüm sonuçları getir...
		$rows = $this->db->get("personel")->result();
		// Tek satırlı sorgu
		//$row = $this->db->get("personel")->row();
		
		$viewData = array("rows" => $rows);
		$this->load->view("database",$viewData);
	}
	public function where(){
		/*
		$rows=$this
			->db
			->where("id >",1)
			->where("id <",4)
			->where("detail !=","")
			->get("personel")
			->result();
		*/
		$where = array(
			"id >" => 1,
			"detail !=" => ""
			);
		$rows=$this
		->db
		->where("id",2)
		->or_where_not_in("title",array("CEO","Genel Müdür","Hademe"))
		->get("personel")
		->result();
		echo $this->db->last_query();
		$viewData = array("rows" => $rows);
		$this->load->view("database",$viewData);
	}
	public function like(){
		$array = array("title" => "müdür","detail" => "boşver");
		$rows=$this->db->or_not_like($array)->get("personel")->result();
		echo $this->db->last_query();
		echo "<pre>"; print_r($rows); echo "</pre>";
	}
	public function order_by(){
		$rows= $this->db->order_by("detail","asc")->get("personel")->result();
		 echo $this->db->last_query();
		echo "<pre>"; print_r($rows); echo "</pre>";
	}
	public function limit(){	
		 $rows = $this->db->order_by("id","desc")->limit("2")->get('personel')->result();
		 echo $this->db->last_query();
		 echo "<pre>"; print_r($rows); echo "</pre>";
	}
	public function query(){
		$rows = $this
		->db
		->where("id >",2)
		->like("title","müdür")
		->order_by("id","desc")
		->limit(2)
		->get("personel")
		->result();
		echo $this->db->last_query();
		echo "<pre>"; print_r($rows); echo "</pre>";
	}
	public function customer_query(){
		$rows=$this->db->query("SELECT * FROM (`personel`) WHERE `id` > 2 AND `title` LIKE '%müdür%' ORDER BY `id` DESC LIMIT 1")->result();
		echo $this->db->last_query();
		echo "<pre>"; print_r($rows); echo "</pre>";
	}
	public function insertpage(){
		$this->load->view("insert");
	}
	public function insert(){
		$title=$this->input->post("title");
		$detail=$this->input->post("detail");
		$data = array("title"=>$title,"detail"=>$detail);
		$this->db->insert("personel",$data);
	}
	public function updatepage(){
		$this->load->view("update");
	}
	public function update(){
		$id=$this->input->post("id");
		$title=$this->input->post("title");
		$detail=$this->input->post("detail");
		$data = array("title"=>$title,"detail"=>$detail);
		$a=$this
		->db
		->where("id",$id)
		->update("personel",$data);
		if($a){
			echo "OK";
		}
	}
	public function delete($id){

		$a= $this
		 ->db
		 ->where("id",$id)
		 ->delete("personel");
		 if($a){
		 	echo "ok";
		 }else{
		 	echo "no";
		 }
	}
	public function model(){
		$this->load->model("personel_model");
		$results=$this->personel_model->get();
		$delete = $this->personel_model->delete(7);
		echo $delete;
	}
	public function model_usage(){
		$this->load->model("personel_model");	
		/*
		~~ Veri Çekme ~~
		$result=$this->personel_model->get(array("id "=> 8));
		echo "<pre>"; print_r($result);
		echo "<hr>";
		$results=$this->personel_model->get_all(array("id <=" => 8));
		echo "<pre>"; print_r($results);
		echo "<hr>";
		~~ Veri Silme ~~
		$delete = $this->personel_model->delete(array("id" => 8));
		echo "<pre>"; print_r($delete);
		echo "<hr>";
		~~ Veri Ekleme ~~
		$data = array("title" => "Ümit UZ","detail" => "Bir adet developer");
		$insert=$this->personel_model->insert($data);
		echo $insert;
		~~ Veri Güncelleme ~~
		$data = array("title" => "deli gibi sevmek ruhumuzda var","detail" => "HAYIRDIR BRO");
		$where = array("id" => 2);
		$update=$this->personel_model->update($data,$where);
		echo $update;
		~~ Query Sorgusu ~~
		$result=$this->personel_model->query("SELECT * FROM personel ORDER BY id DESC LIMIT 2");
		echo "<pre>"; print_r($result);
		~~ Last Insert Id  ~~
		$data = array("title" => "Ümit UZ","detail" => "Bir adet developer");
		$insert=$this->personel_model->insert($data);
		echo "<hr>";
		echo $this->personel_model->get_last_id();
		*/
		$result=$this->personel_model->get(array("id "=> 8));
		echo "<pre>"; print_r($result);
		echo "<hr>";
		$results=$this->personel_model->get_all(array("id <=" => 8));
		echo "<pre>"; print_r($results);
		echo "<hr>";
	}
}

 ?>