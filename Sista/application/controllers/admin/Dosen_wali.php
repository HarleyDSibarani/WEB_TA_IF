<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_wali extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('tingkatan') == 4) {
            $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
            redirect(base_url('login_admin'),'refresh');
        }
        $this->load->model('dosen_model');
        $this->load->model('mhs_model');
        $this->load->model('seminar_model');
        $this->load->model('sidang_model');
    }

    public function index(){
        $dosen = $this->dosen_model->list_dosen_wali();
        $mahasiswa = $this->mhs_model->list_daftar();

        $data = array(  'title'     => 'Data Dosen Wali',
                        'dosen'     => $dosen,
                        'mahasiswa' => $mahasiswa,
                        'isi'       => 'admin/dosen_wali/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function tambah(){
        $dosen = $this->dosen_model->list_dosen_wali();
        $mahasiswa = $this->mhs_model->list_daftar();
        
        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('nip','NIP','required',
                            array('required' => 'NIP Harus Diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));
        $valid->set_rules('keterangan','Keterangan','required',
                            array('required'    => 'Keterangan Harus Diisi'));

        if ($valid->run()===FALSE) {
            $data = array(  'title'     => 'Tambah Data Dosen Wali',
                            'dosen'     => $dosen,
                            'mahasiswa' => $mahasiswa,
                            'isi'       => 'admin/dosen_wali/tambah'
                        );
            $this->load->view('admin/layout/wrapper',$data);
        }else{
            $i    = $this->input;
            $data = array('nama_dosen_wali'      => $i->post('nama'),
                        'nip'             => $i->post('nip'),
                        'email'           => $i->post('email'),
                        'keterangan'      => $i->post('keterangan')
                        );
            $this->dosen_model->tambah_wali($data);
            $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
            redirect(base_url('admin/dosen_wali'));
        }

        $data = array(  'title'     => 'Tambah Data Dosen Wali',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/dosen_wali/tambah'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function edit($id_dosen_wali){
        $dosen = $this->dosen_model->detail_wali($id_dosen_wali);
        $mahasiswa = $this->mhs_model->list_daftar();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('nip','NIP','required',
                            array('required' => 'NIP Harus Diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));
        $valid->set_rules('keterangan','Keterangan','required',
                            array('required'    => 'Keterangan Harus Diisi'));

        if ($valid->run()===FALSE) {
            $data = array(  'title'     => 'Edit Data Dosen Wali ( '.$dosen->nama_dosen_wali.' )',
                            'dosen'     => $dosen,
                            'mahasiswa' => $mahasiswa,
                            'isi'       => 'admin/dosen_wali/edit'
                        );
            $this->load->view('admin/layout/wrapper',$data);
        }else{
            $i    = $this->input;
            $data = array(  'id_dosen_wali'   => $id_dosen_wali,
                            'nama_dosen_wali' => $i->post('nama'),
                            'nip'             => $i->post('nip'),
                            'email'           => $i->post('email'),
                            'keterangan'      => $i->post('keterangan')
                        );
            $this->dosen_model->edit_wali($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit_wali');
            redirect(base_url('admin/dosen_wali'));
        }

        $data = array(  'title'     => 'edit Data Dosen Wali ( '.$dosen->nama_dosen_wali.' )',
                        'dosen'     => $dosen,
                        'mahasiswa' => $mahasiswa,
                        'isi'       => 'admin/dosen_wali/edit'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function hapus($id_dosen_wali){

        $data = array('id_dosen_wali'  => $id_dosen_wali);
        $this->dosen_model->hapus_wali($data);
        $this->session->set_flashdata('SUKSES','Data Dosen Telah Dihapus');
        redirect(base_url('admin/dosen_wali'));
        }
 
}