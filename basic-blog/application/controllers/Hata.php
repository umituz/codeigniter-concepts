<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hata extends CI_Controller {

	public function index()
	{
		$this->load->view('back/pages/hata');
	}
}
