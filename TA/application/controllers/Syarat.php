<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array('title' =>'Ketentuan Tugas Akhir' );
		$this->load->view('home/syarat',$data);
	}
	

}

