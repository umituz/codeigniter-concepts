<?php 

class Page_model extends CI_Model
{
	public $tableName = "pages";

	public function __construct()
	{
		parent::__construct();
	}

	public function get_bottom_menus($menu_id)
	{
		return $this->db->where('top',$menu_id)->get($this->tableName)->result();
	}

	public function group_by($where=array(),$group)
	{
		return $this->db->where($where)->group_by($group)->get($this->tableName)->result();
	}

	public function get($where = array())
	{
		return $this->db->where($where)->get($this->tableName)->row();
	}

	public function get_all($where = array(),$order = "id ASC")
	{
		return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
	}

	public function add($data = array())
	{
		return $this->db->insert($this->tableName,$data);
	}

	public function update($where = array(), $data = array())
	{
		return $this->db->where($where)->update($this->tableName,$data);
	}

	public function delete($where = array())
	{
		return $this->db->where($where)->delete($this->tableName);		
	}
}