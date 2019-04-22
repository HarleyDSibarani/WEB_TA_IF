<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_mhs extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('dosen_model');
		$this->load->model('mhs_model');
		$this->load->model('bimbingan_model');
	}

	public function index(){
		$mahasiswa = $this->mhs_model->listing();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
		$bimbingan = $this->bimbingan_model->listing();

		$data = array(  'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
						'daftar'				=> $bimbingan,
						'dosen_wali'			=> $dosen2,
						'mahasiswa'				=> $mahasiswa
                        );
		$this->load->view('mahasiswa/bimbingan',$data);
	}

	public function read1($id_dospem1){
		
		$dosen = $this->dosen_model->read1($id_dospem1);
		$mahasiswa = $this->mhs_model->listing();
		$dosen1 = $this->dosen_model->list_dospem1();
		$dosen2 = $this->dosen_model->list_dospem2();	
		$dosen3 = $this->dosen_model->list_dosen_wali();
		$bimbingan =$this->bimbingan_model->listing();

		$data = array(  'dosen'  			    => $dosen,
						'dosen_pembimbing_1'    => $dosen1,
						'dosen_pembimbing_2'    => $dosen2,
						'daftar'				=> $bimbingan,
						'dosen_wali'			=> $dosen3,
						'mahasiswa'				=> $mahasiswa
                        );
		$this->load->view('mahasiswa/bimbingan',$data);
	}
	
	public function read2($id_dospem2){

		$dosen = $this->dosen_model->read2($id_dospem2);
		$mahasiswa = $this->mhs_model->listing();
		$dosen1 = $this->dosen_model->list_dospem1();
		$dosen2 = $this->dosen_model->list_dospem2();	
		$dosen3 = $this->dosen_model->list_dosen_wali();
		$bimbingan =$this->bimbingan_model->listing();

		$data = array(  'dosen'    				=> $dosen,
						'dosen_pembimbing_1'    => $dosen1,
						'dosen_pembimbing_2'    => $dosen2,
						'daftar'				=> $bimbingan,
						'dosen_wali'			=> $dosen3,
						'mahasiswa'				=> $mahasiswa
                        );
		$this->load->view('mahasiswa/bimbingan',$data);
	}
}

