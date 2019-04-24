<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing_2 extends CI_Controller {
    public function __construct(){
                parent::__construct();
                $this->load->model('dosen_model');
                $this->check_login->check();
    }

    public function index(){
        $dosen = $this->dosen_model->list_dospem2();
        $data = array(  'title'     => 'Data Dosen Pembimbing 2',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/dosen_pembimbing_2/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function tambah(){
        
        $dosen = $this->dosen_model->list_dospem2();

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

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/dosen/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2024;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto')){
                $data = array(  'title'     => 'Tambah Data Dosen Pembimbing 2',
                                'dosen'     => $dosen,
                                'error'     => $this->upload->display_errors(),
                                'isi'       => 'admin/dosen_pembimbing_2/tambah'
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
                $data = array('nama_dospem'      => $i->post('nama'),
                            'nip'             => $i->post('nip'),
                            'email'           => $i->post('email'),
                            'keterangan'      => $i->post('keterangan'),
                            'beban'           => $i->post('beban'),
                            'foto'            => $upload_foto['upload_foto']['file_name']
                            );
                $this->dosen_model->tambah2($data);
                $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
                redirect(base_url('admin/dosen_pembimbing_2'));
            }
        }

        $data = array(  'title'     => 'Tambah Data Dosen Pembimbing 2',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/dosen_pembimbing_2/tambah'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function edit($id_dospem2){

        $dosen = $this->dosen_model->detail2($id_dospem2);

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

        if ($valid->run()) {

            if (!empty($_FILES['foto']['name'])) { 
                $config['upload_path']          = './assets/upload/dosen/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2024;
                $config['max_width']            = 2024;
                $config['max_height']           = 2024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto')){
                    $data = array(  'title'     => 'Edit Data Dosen Pembimbing 2 ( '.$dosen->nama_dospem.' )',
                                    'dosen'     => $dosen,
                                    'error'     => $this->upload->display_errors(),
                                    'isi'       => 'admin/dosen_pembimbing_2/edit'
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
                    $data = array('id_dospem2'      => $id_dospem2,
                                  'nama_dospem'     => $i->post('nama'),
                                  'nip'             => $i->post('nip'),
                                  'email'           => $i->post('email'),
                                  'keterangan'      => $i->post('keterangan'),
                                  'beban'           => $i->post('beban'),
                                  'foto'            => $upload_foto['upload_foto']['file_name']
                                );
                    $this->dosen_model->edit2($data);
                    $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                    redirect(base_url('admin/dosen_pembimbing_2'));
                }
            }else{
                $i    = $this->input;
                $data = array(  'id_dospem2'      => $id_dospem2,
                                'nama_dospem'     => $i->post('nama'),
                                'nip'             => $i->post('nip'),
                                'email'           => $i->post('email'),
                                'keterangan'      => $i->post('keterangan'),
                                'beban'           => $i->post('beban')
                            );
                $this->dosen_model->edit2($data);
                $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                redirect(base_url('admin/dosen_pembimbing_2'));
            }
        }   

        $data = array(  'title'     => 'Edit Data Dosen Pembimbing 2 ( '.$dosen->nama_dospem.' )',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/dosen_pembimbing_2/edit'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function hapus($id_dospem2){

        $dosen = $this->dosen_model->detail2($id_dospem2);
            unlink('./assets/upload/image/'.$dosen->foto);
            unlink('./assets/upload/image/thumbs/'.$dosen->foto);
        $data = array('id_dospem2'  => $id_dospem2);
        $this->dosen_model->hapus2($data);
        $this->session->set_flashdata('SUKSES','Data Dosen Telah Dihapus');
        redirect(base_url('admin/dosen_pembimbing_1'));
        }
 
}