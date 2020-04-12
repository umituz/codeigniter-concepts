<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$a = 1;
		$b = 2;
		$c = $a + $b;
		$viewData = array();
		$viewData['toplam'] = $c;

		$personel_listesi = array(
			array("isim" => "Ümit UZ", "email" => "umituz998@gmail.com"),
			array("isim" => "Umut UZ", "email" => "umutuz998@gmail.com")
		);
		$viewData['personel_listesi'] = $personel_listesi;

		// $this->load->view("personel_listesi",$viewData);
		
	}

	public function getMessage(){
		echo "bu bir getMessage metodudur";
	}

	public function agzinasicarimsenin(){
		echo "dene ve görr";
	}

	public function helper_test(){
		echo "<pre>"; print_r(get_full_date("2017-09-10")); echo "</pre>";
	}


}
