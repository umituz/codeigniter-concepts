<?php 

class Icerik_Kategori extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->table = "icerik_kategoriler";
	}

	public function get_all($where=array(), $order_by='id ASC', $select='*', $limit=array()){
		$this->db->select($select)->from($this->table)->where($where);
		if(!empty($order_by)){
			$this->db->order_by($order_by);
		}
		if(!empty($limit)){
			$this->db->limit($limit["count"],$limit["start"]);
		}
		$results = $this->db->get()->result();
		return $results;
	}

	public function get($where=array()){
		$result = $this->db->where($where)->get($this->table)->row();
		return $result;
	}

	public function add($data=array()){
		$insert = $this->db->insert($this->table,$data);
		return $insert;
	}

	public function update($where=array(), $data=array()){
		$update=$this->db->where($where)->update($this->table,$data);
		return $update;
	}

	public function delete($where=array()){
		$delete = $this->db->where($where)->delete($this->table);
		return $delete;
	}

	public function get_insert_id(){
		$result = $this->db->insert_id();
		return $result;
	}

	function umutsql(){
		$this->db->select($select)->from($this->table)->where($where);
	}

	function makale($seo){
		$result = $this->db->select('*')->from('icerik')->where('seo',$seo)->get()->row();
		return $result;
	}

}

 ?>