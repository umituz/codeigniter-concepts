<?php 

function seo($s) {
	$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',' ',',','?');
	$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
	$s = str_replace($tr,$eng,$s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = preg_replace('/#/', '', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}

function pre($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function br(){
	echo "<br />";
}

function kategori_say($name)
{
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('kategori',$name);
	$ci->db->from('icerik');
	$sonuc = $ci->db->count_all_results();
	return $sonuc;
}

function kategori_ad($id)
{
	$ci = &get_instance();
	$ci->load->database();
	$sql = "SELECT * FROM icerik_kategoriler WHERE id='$id'";
	$query = $ci->db->query($sql);
	$row = $query->row();
	return $row->kategori_ad;
}

?>