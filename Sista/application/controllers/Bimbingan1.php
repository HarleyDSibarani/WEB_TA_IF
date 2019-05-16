<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan1 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('dosen_model');
		$this->load->model('mhs_model');
	}

	public function index(){
		$mahasiswa = $this->mhs_model->listing();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();

		$data = array(  'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
						'dosen_wali'			=> $dosen2,
						'mahasiswa'				=> $mahasiswa
                        );
		$this->load->view('home/bimbingan1',$data);
	}

	public function read1($id_dospem1){
		
		$dosen = $this->dosen_model->read1($id_dospem1);
		$mahasiswa = $this->mhs_model->beban1();
		$dosen1 = $this->dosen_model->list_dospem1();
		$dosen2 = $this->dosen_model->list_dospem2();	
		$dosen3 = $this->dosen_model->list_dosen_wali();
		
		$data = array(  'dosen'  			    => $dosen,
						'dosen_pembimbing_1'    => $dosen1,
						'dosen_pembimbing_2'    => $dosen2,
						'dosen_wali'			=> $dosen3,
						'mahasiswa'				=> $mahasiswa
                        );
		$this->load->view('home/bimbingan1',$data);
	}
}

