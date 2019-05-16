<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
                parent::__construct();
                if ($this->session->userdata('tingkat_admin') != 1) {
                    $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
                    redirect(base_url('admin/dosen_pembimbing_1'),'refresh');
                }
                $this->load->model('admin_model');
                $this->load->model('dosen_model');
                $this->load->model('tingkatan_model');
                $this->load->model('mhs_model');
                $this->load->model('seminar_model');
                $this->load->model('sidang_model');
    }

    public function index(){
        $admin = $this->admin_model->listing();
        $mhs_pending = $this->mhs_model->list_daftar();
        $data = array(  'title'     => 'Data Adminstrator',
                        'admin'     => $admin,
                        'mahasiswa' =>  $mhs_pending,
                        'isi'       => 'admin/dasbor/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function tambah(){
 
        $admin = $this->admin_model->listing();
        $tingkatan = $this->tingkatan_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('username','Username','required|is_unique[admin.username]',
                            array('required'  => 'username Harus Diisi',
                                  'is_unique' => 'Username <Strong>'.$this->input->post('username').'/Strong Sudah Ada. Buat Username Baru'));
        $valid->set_rules('password','Password','required|max_length[16]|min_length[8]',
                            array('required'    => 'Password Harus Diisi',
                                  'min_length'  => 'Password Minimal 8 karakter',
                                  'max_length'  => 'Password Maksimal 16 karakter',));
        $valid->set_rules('tingkatan','Tingkatan','required',
                            array('required'    => 'Tingkatan Harus Diisi'));

        if ($valid->run()===FALSE) {
			    $data = array('title'       => 'Tambah Data Admin',
                              'admin'       => $admin,
                              'tingkatan'   => $tingkatan,
                              'isi'         => 'admin/dasbor/tambah'
                            );
			     $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            $data = array('nama'            => $i->post('nama'),
                          'username'        => $i->post('username'),
                          'password'        => sha1($i->post('password')),
                          'id_tingkatan'    => $i->post('tingkatan')
                        );
            $this->admin_model->tambah($data);
            $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
            redirect(base_url('admin/admin'));
        }
    }

    public function edit($id_admin){

        $admin = $this->admin_model->detail($id_admin);
        $tingkatan = $this->tingkatan_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('tingkatan','Tingkatan','required',
                            array('required'    => 'Tingkatan Harus Diisi'));

        if ($valid->run()===FALSE) {
			    $data = array('title'     => 'Edit Data Admin'.$admin->nama,
                              'admin'     => $admin,
                              'tingkatan' => $tingkatan,
                              'isi'       => 'admin/dasbor/edit'
                            );
			     $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            if(strlen($i->post('password')) > 8) {
                $data = array('id_admin'        => $id_admin,
                              'nama'            => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'password'        => sha1($i->post('password')),
                              'id_tingkatan'    => $i->post('tingkatan')
                            );
            }else {
                $data = array('id_admin'        => $id_admin,
                              'nama'            => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'id_tingkatan'    => $i->post('tingkatan')
                            );
            }
            $this->admin_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/admin'));
        }

    }

    public function hapus($id_admin){
        
        $data = array('id_admin'  => $id_admin);
        $this->admin_model->hapus($data);
        $this->session->set_flashdata('SUKSES','Data Admin Telah Dihapus');
        redirect(base_url('admin/admin'));
        }
 
}