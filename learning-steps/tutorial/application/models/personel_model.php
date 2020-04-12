<?php 

class personel_model extends CI_Model{
	
	public function get($where = array()){
		$result = $this->db->where($where)->get("personel")->row();
		return $result;
	}
	public function get_all($where = array()){
		$result = $this->db->where($where)->order_by("id","desc")->limit(3)->get("personel")->result();
		return $result;
	}
	public function delete($where = array()){
		$result=$this->db->where($where)->delete("personel");
		return $result;
	}
	public function insert($data = array()){
		$insert = $this->db->insert("personel",$data);
		return $insert;
	}
	public function update($data = array(), $where = array()){
		$update = $this->db->where($where)->update("personel",$data);
		return  $update;
	}
	public function query($query){
		$result=$this->db->query($query)->result();
		return $result;
	}
	public function get_last_id(){
		return $this->db->insert_id();	
	}

}

 ?>