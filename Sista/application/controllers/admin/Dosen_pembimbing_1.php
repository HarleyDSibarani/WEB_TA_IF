<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing_1 extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('tingkatan') == 4 && $this->session->userdata('tingkatan') == 3) {
            $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
            redirect(base_url('login_admin'),'refresh');
        }
        $this->load->model('dosen_model');
        $this->load->model('mhs_model');
        $this->load->model('seminar_model');
        $this->load->model('sidang_model');
        $this->check_login_admin->check_admin();
    }

    public function index(){
        $dosen = $this->dosen_model->list_dospem1();
        $mahasiswa = $this->mhs_model->list_daftar();
        $data = array(  'title'     => 'Data Dosen Pembimbing 1',
                        'dosen'     => $dosen,
                        'mahasiswa' => $mahasiswa,
                        'isi'       => 'admin/dosen_pembimbing_1/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function tambah(){

        $dosen = $this->dosen_model->list_dospem1();
        $mahasiswa = $this->mhs_model->list_daftar();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('nip','NIP','required',
                            array('required' => 'NIP Harus Diisi'));
        $valid->set_rules('keterangan','Keterangan','required',
                            array('required'    => 'Keterangan Harus Diisi'));

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/dosen/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2024;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto')){
                $data = array(  'title'     => 'Tambah Data Dosen Pembimbing 1',
                                'dosen'     => $dosen,
                                'error'     => $this->upload->display_errors(),
                                'isi'       => 'admin/dosen_pembimbing_1/tambah'
                            );
                $this->load->view('admin/layout/wrapper',$data);
            }else{
                $upload_foto = array('upload_foto' => $this->upload->data());

                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/dosen/image/'.$upload_foto['upload_foto']['file_name'];
                $config['new_image']        = './assets/upload/dosen/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['thumb_marker']     = '';
                $config['width']            = 250;
                $config['height']           = 250;
                
                $this->load->library('image_lib', $config);
                
                $this->image_lib->resize();

                $i    = $this->input;
                $data = array('nama_dospem'   => $i->post('nama'),
                            'nip'             => $i->post('nip'),
                            'email'           => $i->post('email'),
                            'asal'            => $i->post('asal'),
                            'keterangan'      => $i->post('keterangan'),
                            'foto'            => $upload_foto['upload_foto']['file_name']
                            );
                $this->dosen_model->tambah1($data);
                $this->session->set_flashdata('sukses','Data Telah Ditambahkan');
                redirect(base_url('admin/dosen_pembimbing_1'));
            }
        }

        $data = array(  'title'     => 'Tambah Data Dosen Pembimbing 1',
                        'dosen'     => $dosen,                        
                        'mahasiswa' => $mahasiswa,
                        'isi'       => 'admin/dosen_pembimbing_1/tambah'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function edit($id_dospem1){

        $dosen = $this->dosen_model->detail1($id_dospem1);
        $mahasiswa = $this->mhs_model->list_daftar();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('nip','NIP','required',
                            array('required' => 'NIP Harus Diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('valid_email' => 'Email Tidak Valid'));
        $valid->set_rules('keterangan','Keterangan','required',
                            array('required'    => 'Keterangan Harus Diisi'));

        if ($valid->run()) {

            if (!empty($_FILES['foto']['name'])) { 
                $config['upload_path']          = './assets/upload/dosen/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2024;
                $config['max_width']            = 2024;
                $config['max_height']           = 2024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto')){
                    $data = array(  'title'     => 'Edit Data Dosen Pembimbing 1 ( '.$dosen->nama_dospem1.' )',
                                    'dosen'     => $dosen,
                                    'error'     => $this->upload->display_errors(),
                                    'isi'       => 'admin/dosen_pembimbing_1/edit'
                                );
                    $this->load->view('admin/layout/wrapper',$data);
                }else{
                    $upload_foto = array('upload_foto' => $this->upload->data());

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/dosen/image/'.$upload_foto['upload_foto']['file_name'];
                    $config['new_image']        = './assets/upload/dosen/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['thumb_marker']     = '';
                    $config['width']            = 250;
                    $config['height']           = 250;
                    
                    $this->load->library('image_lib', $config);
                    
                    $this->image_lib->resize();

                    if ($dosen->foto != "") {
                        unlink('./assets/upload/dosen/image/'.$dosen->foto);
                        unlink('./assets/upload/dosen/image/thumbs/'.$dosen->foto);
                    }

                    $i    = $this->input;
                    $data = array('id_dospem1'      => $id_dospem1,
                                  'nama_dospem'     => $i->post('nama'),
                                  'nip'             => $i->post('nip'),
                                  'email'           => $i->post('email'),
                                  'asal'            => $i->post('asal'),
                                  'keterangan'      => $i->post('keterangan'),
                                  'foto'            => $upload_foto['upload_foto']['file_name']
                                );
                    $this->dosen_model->edit1($data);
                    $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                    redirect(base_url('admin/dosen_pembimbing_1'));
                }
            }else{
                $i    = $this->input;
                $data = array(  'id_dospem1'      => $id_dospem1,
                                'nama_dospem'     => $i->post('nama'),
                                'nip'             => $i->post('nip'),
                                'email'           => $i->post('email'),
                                'asal'            => $i->post('asal'),
                                'keterangan'      => $i->post('keterangan')
                            );
                $this->dosen_model->edit1($data);
                $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                redirect(base_url('admin/dosen_pembimbing_1'));
            }
        }   

        $data = array(  'title'     => 'Edit Data Dosen Pembimbing 1 ( '.$dosen->nama_dospem.' )',
                        'dosen'     => $dosen,
                        'mahasiswa' => $mahasiswa,
                        'isi'       => 'admin/dosen_pembimbing_1/edit'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function hapus($id_dospem1){

        $dosen = $this->dosen_model->detail1($id_dospem1);
            unlink('./assets/upload/image/'.$dosen->foto);
            unlink('./assets/upload/image/thumbs/'.$dosen->foto);
        $data = array('id_dospem1'  => $id_dospem1);
        $this->dosen_model->hapus1($data);
        $this->session->set_flashdata('SUKSES','Data Dosen Telah Dihapus');
        redirect(base_url('admin/dosen_pembimbing_1'));
        }
 
}