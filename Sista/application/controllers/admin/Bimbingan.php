<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {
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
        $this->load->model('bimbingan_model');
    }

    public function index(){
        $admin = $this->admin_model->listing();
        $mhs_pending = $this->mhs_model->list_daftar();
        $mahasiswa = $this->mhs_model->listing();
        $dosen1 = $this->dosen_model->list_dospem1();
        $dosen2 = $this->dosen_model->list_dospem2();
        $bimbingan = $this->bimbingan_model->listing();
        $data = array(  'title'     => 'Data Bimbingan',
                        'admin'     => $admin,
                        'mahasiswa' => $mhs_pending,
                        'mahasiswa' => $mahasiswa,
                        'dosen1'    => $dosen1,
                        'dosen2'    => $dosen2,
                        'bimbingan' => $bimbingan,
                        'isi'       => 'admin/bimbingan/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function pesan($id_mhs){
        $admin = $this->admin_model->listing();
        $mhs_pending = $this->mhs_model->list_daftar();
        $mahasiswa = $this->mhs_model->detail($id_mhs);
        $dosen1 = $this->dosen_model->list_dospem1();
        $dosen2 = $this->dosen_model->list_dospem2();
        $bimbingan = $this->bimbingan_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('to','To','required',
                            array('required' => 'Penerima Harus Diisi'));
        $valid->set_rules('from','From','required',
                            array('required'  => 'Pengirim Harus Diisi'));
        $valid->set_rules('as','As','required',
                            array('required'    => 'Sebagai Harus Diisi',));
        $valid->set_rules('isi','Tingkatan','required',
                            array('required'    => 'Isi Harus Diisi'));

        if ($valid->run()===FALSE) {
            $data = array(  'admin'     => $admin,
                            'mahasiswa' => $mhs_pending,
                            'mahasiswa' => $mahasiswa,
                            'dosen1'    => $dosen1,
                            'dosen2'    => $dosen2,
                            'bimbingan' => $bimbingan,
                            'title'     => 'Pesan Bimbingan',
                            'isi'       => 'admin/bimbingan/pesan'
                        );
            $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            $data = array('nama_mhs'       => $i->post('to'),
                          'nama_dosen'     => $i->post('from'),
                          'sebagai'        => $i->post('as'),
                          'pesan'          => $i->post('isi'),
                          'tgl_kirim'      => date('Y-m-d', strtotime('now'))
                        );
            $this->bimbingan_model->tambah($data);
            $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
            redirect(base_url('admin/bimbingan'));
        }
        
    }
}

/* End of file Bimbingan.php */
/* Location: ./application/controllers/admin/Bimbingan.php */