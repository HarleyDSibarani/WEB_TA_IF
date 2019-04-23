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
                        'isi'       => 'admin/admin1_KorTA/dosen_pembimbing/list'
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

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/dosen/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2024;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto')){
                $data = array(  'title'     => 'Tambah Data Dosen Pembimbing',
                                'dosen'     => $dosen,
                                'error'     => $this->upload->display_errors(),
                                'isi'       => 'admin/admin1_KorTA/dosen_pembimbing/tambah'
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
                $data = array('nama_dosen'      => $i->post('nama'),
                            'nip'             => $i->post('nip'),
                            'email'           => $i->post('email'),
                            'keterangan'      => $i->post('keterangan'),
                            'beban'           => $i->post('beban'),
                            'foto'            => $upload_foto['upload_foto']['file_name']
                            );
                $this->dosen_model->tambah($data);
                $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
                redirect(base_url('admin/admin1/dosen_pembimbing'));
            }
        }

        $data = array(  'title'     => 'Tambah Data Dosen Pembimbing',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/admin1_KorTA/dosen_pembimbing/tambah'
                     );
        $this->load->view('admin/layout/wrapper',$data);
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

        if ($valid->run()) {

            if (!empty($_FILES['foto']['name'])) { 
                $config['upload_path']          = './assets/upload/dosen/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2024;
                $config['max_width']            = 2024;
                $config['max_height']           = 2024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto')){
                    $data = array(  'title'     => 'Edit Data Dosen Pembimbing'.$dosen->nama_dosen,
                                    'dosen'     => $dosen,
                                    'error'     => $this->upload->display_errors(),
                                    'isi'       => 'admin/admin1_KorTA/dosen_pembimbing/edit'
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
                    $data = array('id_dosen'        => $id_dosen,
                                  'nama_dosen'      => $i->post('nama'),
                                  'nip'             => $i->post('nip'),
                                  'email'           => $i->post('email'),
                                  'keterangan'      => $i->post('keterangan'),
                                  'beban'           => $i->post('beban'),
                                  'foto'            => $upload_foto['upload_foto']['file_name']
                                );
                    $this->dosen_model->edit($data);
                    $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                    redirect(base_url('admin/admin1/dosen_pembimbing'));
                }
            }else{
                $i    = $this->input;
                $data = array(  'id_dosen'        => $id_dosen,
                                'nama_dosen'      => $i->post('nama'),
                                'nip'             => $i->post('nip'),
                                'email'           => $i->post('email'),
                                'keterangan'      => $i->post('keterangan'),
                                'beban'           => $i->post('beban')
                            );
                $this->dosen_model->edit($data);
                $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                redirect(base_url('admin/admin1/dosen_pembimbing'));
            }
        }   

        $data = array(  'title'     => 'Edit Data Dosen Pembimbing'.$dosen->nama_dosen,
                        'dosen'     => $dosen,
                        'isi'       => 'admin/admin1_KorTA/dosen_pembimbing/edit'
                     );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function hapus($id_dosen){
        $dosen = $this->dosen_model->detail($id_dosen);
            unlink('./assets/upload/image/'.$dosen->foto);
            unlink('./assets/upload/image/thumbs/'.$dosen->foto);
        $data = array('id_dosen'  => $id_dosen);
        $this->dosen_model->hapus($data);
        $this->session->set_flashdata('SUKSES','Data Dosen Telah Dihapus');
        redirect(base_url('admin/admin1/dosen_pembimbing'));
        }
 
}