<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login_mhs->check();
		if ($this->session->userdata('status') != 1) {
                    $this->session->set_flashdata('sukses','Anda Belum Divalidasi');
                    redirect(base_url('login_mhs'),'refresh');
                }
		$this->load->model('syarat_model');
		$this->load->model('mhs_model');
		$this->load->model('sidang_model');
	}

	public function index(){
		$syarat = $this->syarat_model->listing();
		$mhs = $this->mhs_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $peserta = $this->sidang_model->peserta();

		$data = array('title' 	=> 'Ketentuan Tugas Akhir',
					  'syarat'	=> $syarat,
					  'peserta'	=> $peserta,
					  'mhs'		=> $mhs,
                      'dokumen' => $dokumen,
					  'isi'     => 'mahasiswa/syarat'
                    );
		$this->load->view('mahasiswa/layout/wrapper',$data);
	}
	

}

