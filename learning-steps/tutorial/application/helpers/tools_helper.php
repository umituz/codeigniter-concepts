<?php 

function topla($sayi1,$sayi2){
	return $sayi1 + $sayi2;
}

function get_full_date($date){
	$aylar =  array(
		"Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık"
	);
	$tmp_date = explode("-",$date);
	echo $new_date = $tmp_date[2]." ".$aylar[$tmp_date[1]-1]." ".$tmp_date[0];
}

 ?>