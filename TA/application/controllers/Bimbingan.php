<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('dosen_model');
	}

	public function index(){
		$dosen = $this->dosen_model->profil();
		$data = array( 'dosen'     => $dosen );
		$this->load->view('home/bimbingan',$data);
	}

	public function read($id_dosen){
		$dosen = $this->dosen_model->read($id_dosen);

		$data = array( 'dosen'    => $dosen );
		$this->load->view('home/bimbingan',$data);
	}
}

