<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
 	public function __construct(){
        parent::__construct();
        if ($this->session->userdata('tingkat_admin') != 3 && $this->session->userdata('tingkat_admin') != 1) {
            $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
            redirect(base_url('login_admin'),'refresh');
        }
        $this->load->model('admin_model');
        $this->load->model('tingkatan_model');
        $this->load->model('mhs_model');
        $this->load->model('dosen_model');
        $this->load->model('seminar_model');
        $this->load->model('sidang_model');
    }

    public function index(){
        $dosen1 = $this->dosen_model->list_dospem1();
        $dosen2 = $this->dosen_model->list_dospem2();
        $proposal = $this->seminar_model->list_proposal();
        $hasil = $this->seminar_model->list_hasil();
        $sidang = $this->sidang_model->listing();
        
        $data = array(  'title'                 => 'Jadwal Seminar atau Sidang',
                        'title1'                => 'Mahasiswa Seminar Proposal',
                        'title2'                => 'Mahasiswa Seminar Hasil',
                        'title3'                => 'Mahasiswa Sidang',
                        'sidang'                => $sidang,
                        'dosen_pembimbing_1'    => $dosen1,
                        'dosen_pembimbing_2'    => $dosen2,
                        'proposal'              => $proposal,
                        'hasil'                 => $hasil,
                        'isi'                   => 'admin/jadwal/list'
                );
        $this->load->view('admin/layout/wrapper',$data);
    }
}

/* End of file Jadwal.php */
/* Location: ./application/controllers/admin/Jadwal.php */