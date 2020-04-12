<?php 

class Genel_Ayar extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->table = "ayar_genel";
	}

	public function get($where=array()){
		$result = $this->db->where($where)->get($this->table)->row();
		return $result;
	}

	public function update($where=array(), $data=array()){
		$update=$this->db->where($where)->update($this->table,$data);
		return $update;
	}

}

 ?>