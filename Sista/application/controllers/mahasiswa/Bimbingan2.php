<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan2 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login_mhs->check();
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
		$this->load->view('mahasiswa/bimbingan2',$data);
	}
	
	public function read2($id_dospem2){

		$dosen = $this->dosen_model->read2($id_dospem2);
		$mahasiswa = $this->mhs_model->beban2();
		$dosen1 = $this->dosen_model->list_dospem1();
		$dosen2 = $this->dosen_model->list_dospem2();	
		$dosen3 = $this->dosen_model->list_dosen_wali();

		$data = array(  'dosen'    				=> $dosen,
						'dosen_pembimbing_1'    => $dosen1,
						'dosen_pembimbing_2'    => $dosen2,
						'dosen_wali'			=> $dosen3,
						'mahasiswa'				=> $mahasiswa
                        );
		$this->load->view('mahasiswa/bimbingan2',$data);
	}
}

