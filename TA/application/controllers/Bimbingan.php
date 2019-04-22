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

	public function read1($id_dospem1){
		$dosen = $this->dosen_model->read1($id_dospem1);

		$data = array( 'dosen'    => $dosen );
		$this->load->view('home/bimbingan',$data);
	}
	
	public function read2($id_dospem2){
		$dosen = $this->dosen_model->read2($id_dospem2);

		$data = array( 'dosen'    => $dosen );
		$this->load->view('home/bimbingan',$data);
	}
}

