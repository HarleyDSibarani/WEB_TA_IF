<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->check_login_mhs->check();
        if ($this->session->userdata('status') != 1) {
                    $this->session->set_flashdata('sukses','Anda Belum Divalidasi');
                    redirect(base_url('login_mhs'),'refresh');
                }
		$this->load->model('dosen_model');
        $this->load->model('mhs_model');
        $this->load->model('syarat_model');
        $this->load->model('seminar_model');
        $this->load->model('sidang_model');
	}

	public function index(){
		$dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
        $beban1 = $this->dosen_model->beban1();
        $beban2 = $this->dosen_model->beban2();
		$mahasiswa = $this->mhs_model->listing();
        $syarat = $this->syarat_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $peserta = $this->sidang_model->peserta();
        $proposal = $this->seminar_model->list_jadwal_seminar_proposal();
        $hasil = $this->seminar_model->list_jadwal_seminar_hasil();

        $data = array(  'title'       			=> 'Sistem Informasi Management Tugas Akhir Teknik Indormatika',
                        'mahasiswa'   			=> $mahasiswa,
                        'peserta'               => $peserta,
                        'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
						'dosen_wali'       		=> $dosen2,
                        'beban1'                => $beban1,
                        'beban2'                => $beban2,
                        'proposal'              => $proposal,
                        'hasil'                 => $hasil,
                        'syarat'           		=> $syarat,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'mahasiswa/home'
                        );
        $this->load->view('mahasiswa/layout/wrapper',$data);
    }
    
    public function peserta(){
        $dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
        $dokumen = $this->syarat_model->list_dokumen();
        $mahasiswa = $this->sidang_model->peserta();
        $syarat = $this->syarat_model->listing();
        $peserta = $this->sidang_model->peserta();

        $data = array(  'title'                 => 'Daftar Peserta Tugas Akhir 1',
                        'mahasiswa'   			=> $mahasiswa,
                        'peserta'               => $peserta,
                        'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
                        'dosen_wali'       		=> $dosen2,
                        'syarat'           		=> $syarat,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'mahasiswa/peserta'
                
                    );
        $this->load->view('mahasiswa/layout/wrapper',$data);
    }
}
