<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct(){
                parent::__construct();
                $this->load->model('mhs_model');
                $this->load->model('dosen_model');
    }

    public function index(){
        $mahasiswa = $this->mhs_model->listing();
        $data = array(  'title'     => 'Data Mahasiswa',
                        'mahasiswa' => $mahasiswa,
                        'isi'       => 'admin/admin3_DosPem/mahasiswa/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function tambah(){
        $mahasiswa = $this->mhs_model->listing();
        $dosen = $this->dosen_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('username','Username','required|is_unique[admin.username]',
                            array('required'  => 'username Harus Diisi',
                                  'is_unique' => 'Username <Strong>'.$this->input->post('username').'/Strong Sudah Ada. Buat Username Baru'
                                ));
        $valid->set_rules('nip','NIP','required',
                            array('required' => 'NIP Harus Diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));
        $valid->set_rules('password','Password','required|max_length[16]|min_length[8]',
                            array('required'    => 'Password Harus Diisi',
                                  'min_length'  => 'Password Minimal 8 karakter',
                                  'max_length'  => 'Password Maksimal 16 karakter',));
        $valid->set_rules('tingkatan','Tingkatan','required',
                            array('required'    => 'Tingkatan Harus Diisi'));

        if ($valid->run()===FALSE) {
			    $data = array('title'       => 'Tambah Data Mahasiswa',
                              'mahasiswa'   => $mahasiswa,
                              'dosen'       => $dosen,
                              'isi'         => 'admin/admin3_DosPem/mahasiswa/tambah'
                            );
			     $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            $data = array('nama'            => $i->post('nama'),
                          'username'        => $i->post('username'),
                          'nip'             => $i->post('nip'),
                          'email'           => $i->post('email'),
                          'password'        => sha1($i->post('password')),
                          'id_tingkatan'    => $i->post('tingkatan')
                        );
            $this->mhs_model->tambah($data);
            $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
            redirect(base_url('admin/admin3/mahasiswa'));
        }
    }

    public function edit($id_mhs){
        $mahasiswa = $this->mhs_model->detail($id_mhs);
        $dosen = $this->dosen_model->listing();


        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('nip','NIP','required',
                            array('required' => 'NIP Harus Diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));
        $valid->set_rules('password','Password','required|max_length[16]|min_length[8]',
                            array('required'    => 'Password Harus Diisi',
                                  'min_length'  => 'Password Minimal 8 karakter',
                                  'max_length'  => 'Password Maksimal 16 karakter',));
        $valid->set_rules('tingkatan','Tingkatan','required',
                            array('required'    => 'Tingkatan Harus Diisi'));

        if ($valid->run()===FALSE) {
			    $data = array('title'      => 'Edit Data Mahasiswa'.$mahasiswa->nama,
                              'mahasiswa'  => $mahasiswa,
                              'dosen'      => $dosen,
                              'isi'        => 'adminadmin3_DosPem/mahasiswa/edit'
                            );
			     $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            if(strlen($i->post('password')) > 8) {
                $data = array('id_mhs'        => $id_mhs,
                              'nama'            => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'nip'             => $i->post('nip'),
                              'email'           => $i->post('email'),
                              'password'        => sha1($i->post('password')),
                              'id_tingkatan'    => $i->post('tingkatan')
                            );
            }else {
                $data = array('id_mhs'        => $id_mhs,
                              'nama'            => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'nip'             => $i->post('nip'),
                              'email'           => $i->post('email'),
                              'id_tingkatan'    => $i->post('tingkatan')
                            );
            }
            $this->mhs_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/admin3/mahasiswa'));
        }

    }

    public function hapus($id_mhs){
        $data = array('id_mhs'  => $id_mhs);
        $this->mhs_model->hapus($data);
        $this->session->set_flashdata('SUKSES','Data Mahasiswa Telah Dihapus');
        redirect(base_url('admin/admin3/mahasiswa'));
        }
 
}