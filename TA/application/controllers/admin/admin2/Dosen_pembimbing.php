<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing extends CI_Controller {
    public function __construct(){
                parent::__construct();
                $this->load->model('dosen_model');
    }

    public function index(){
        $dosen = $this->dosen_model->listing();
        $data = array(  'title'     => 'Data Dosen Pembimbing',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/admin2_SekKorTA/dosen_pembimbing/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function tambah(){
        $dosen = $this->dosen_model->listing();
        
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
        $valid->set_rules('beban','Beban','required',
                            array('required'    => 'Beban Harus Diisi'));

        if ($valid->run()===FALSE) {
			    $data = array('title'     => 'Data Dosen Pembimbing',
                              'dosen'     => $dosen,
                              'isi'       => 'admin/admin2_SekKorTA/dosen_pembimbing/tambah'
                            );
			     $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            $data = array('nama_dosen'      => $i->post('nama'),
                          'nip'             => $i->post('nip'),
                          'email'           => $i->post('email'),
                          'keterangan'      => $i->post('keterangan'),
                          'beban'           => $i->post('beban')
                        );
            $this->dosen_model->tambah($data);
            $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
            redirect(base_url('admin/admin2/dosen_pembimbing'));
        }
    }

    public function edit($id_dosen){
        $dosen = $this->dosen_model->detail($id_dosen);

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
        $valid->set_rules('beban','Beban','required',
                            array('required'    => 'Beban Harus Diisi'));

                            
        if ($valid->run()===FALSE) {
			    $data = array('title'     => 'Data Dosen Pembimbing',
                              'dosen'     => $dosen,
                              'isi'       => 'admin/admin2_SekKorTA/dosen_pembimbing/edit'
                            );
			     $this->load->view('admin/layout/wrapper',$data);
        }else {
            $i    = $this->input;
            if(strlen($i->post('password')) > 8) {
                $data = array('id_dosen'        -> $id_dosen,
                              'nama_dosen'      => $i->post('nama'),
                              'nip'             => $i->post('nip'),
                              'email'           => $i->post('email'),
                              'keterangan'      => $i->post('keterangan'),
                              'beban'           => $i->post('beban')
                             );
            }else {
                $data = array('id_dosen'        -> $id_dosen,
                              'nama_dosen'      => $i->post('nama'),
                              'nip'             => $i->post('nip'),
                              'email'           => $i->post('email'),
                              'keterangan'      => $i->post('keterangan'),
                              'beban'           => $i->post('beban')
                          );
            }
            $this->dosen_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/admin2/dosen_pembimbing'));
        }

    }

    public function hapus($id_dosen){
        $data = array('id_dosen'  => $id_dosen);
        $this->dosen_model->hapus($data);
        $this->session->set_flashdata('SUKSES','Data Dosen Telah Dihapus');
        redirect(base_url('admin/admin2/dosen_pembimbing'));
        }
 
}