<?php 

class deneme extends CI_Controller{
	public function index(){
		echo "deneme beni denerim seni";
	}

	public function detay(){
		echo "detaylandırma";
	}
	public function getParams($param1,$param2,$param3){
		if($param3 == "toplam"){
			echo $param3=$param1+$param2;
		}elseif ($param3 == "cikarma") {
			echo $param3=$param1-$param2;
		}elseif ($param3 == "carpma") {
			echo $param3=$param1*$param2;
		}elseif ($param3 == "bolme") {
			echo $param3=$param1/$param2;
		}elseif ($param3 == "modalma") {
			echo $param3=$param1%$param2;
		}
	}
	public function getParameters(){
		if($this->uri->segment(5) == "toplama"){
			echo $this->uri->segment(3) + $this->uri->segment(4);
		}elseif($this->uri->segment(5) == "cikarma"){
			echo $this->uri->segment(3) - $this->uri->segment(4);
		}elseif($this->uri->segment(5) == "bolme"){
			echo $this->uri->segment(3) / $this->uri->segment(4);
		}elseif($this->uri->segment(5) == "carpma"){
			echo $this->uri->segment(3) * $this->uri->segment(4);
		}elseif($this->uri->segment(5) == "modalma"){
			echo $this->uri->segment(3) % $this->uri->segment(4);
		}
	}
}

 ?>