<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('dosen_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$data = array(  'title'					 => 'Sistem Informasi Management Tugas Akhir',
						'dosen_pembimbing_1'     => $dosen,
						'dosen_pembimbing_2'     => $dosen1
                        );
		$this->load->view('home/home',$data);
	}
}
