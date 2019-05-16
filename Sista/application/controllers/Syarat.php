<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('syarat_model');
		$this->load->model('sidang_model');
	}

	public function index(){
		$syarat = $this->syarat_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $peserta = $this->sidang_model->peserta();
		$data = array('title' 	=> 'Ketentuan Tugas Akhir',
					  'syarat'	=> $syarat,
					  'peserta'	=> $peserta,
					  'dokumen'	=> $dokumen,
					  'isi'     => 'home/syarat'
                    );
    $this->load->view('home/layout/wrapper',$data);
	}
}

