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
                        'isi'       => 'admin/admin1_KorTA/mahasiswa/list'
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
        $valid->set_rules('password','Password','required|max_length[16]|min_length[8]',
                            array('required'    => 'Password Harus Diisi',
                                    'min_length'  => 'Password Minimal 8 karakter',
                                    'max_length'  => 'Password Maksimal 16 karakter',));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));  
        $valid->set_rules('angkatan','Angkatan','required',
                            array('required'    => 'Angkatan Harus Diisi'));
        $valid->set_rules('dospem1','Dospem1','required',
                            array('required'    => 'Dosen Pembimbing Harus Diisi'));
        $valid->set_rules('nim','NIM','required',
                            array('required' => 'NIM Harus Diisi'));              

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/mhs/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2024;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto')){
                
                $data = array(  'title'       => 'Tambah Data Mahasiswa',
                                'mahasiswa'   => $mahasiswa,
                                'dosen'       => $dosen,
                                'error'       => $this->upload->display_errors(),
                                'isi'         => 'admin/admin1_KorTA/mahasiswa/tambah'
                            );
                    $this->load->view('admin/layout/wrapper',$data);
            }else{
                $upload_foto = array('upload_foto' => $this->upload->data());

                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/mhs/image/'.$upload_foto['upload_foto']['file_name'];
                $config['new_image']        = './assets/upload/mhs/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['thumb_marker']     = '';
                $config['width']            = 250;
                $config['height']           = 250;
                
                $this->load->library('image_lib', $config);
                
                $this->image_lib->resize();

                $i    = $this->input;
                $data = array('nama_mhs'            => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'password'        => sha1($i->post('password')),
                              'email'           => $i->post('email'),
                              'angkatan'        => $i->post('angkatan'),
                              'id_dosen1'        => $i->post('dospem1'),
                              'nim'             => $i->post('nim'),
                              'foto'            => $upload_foto['upload_foto']['file_name']
                            );
                $this->mhs_model->tambah($data);
                $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
                redirect(base_url('admin/admin1/mahasiswa'));
            }
        }

        $data = array(  'title'       => 'Tambah Data Mahasiswa',
                        'mahasiswa'   => $mahasiswa,
                        'dosen'       => $dosen,
                        'isi'         => 'admin/admin1_KorTA/mahasiswa/tambah'
                    );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function edit($id_mhs){
        $mahasiswa = $this->mhs_model->detail($id_mhs);
        $dosen = $this->dosen_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));  
        $valid->set_rules('angkatan','Angkatan','required',
                            array('required'    => 'Angkatan Harus Diisi'));
        $valid->set_rules('dospem1','Dospem1','required',
                            array('required'    => 'Dosen Pembimbing Harus Diisi'));
        $valid->set_rules('nim','NIM','required',
                            array('required' => 'NIM Harus Diisi'));                            
        if ($valid->run()) {

            if (!empty($_FILES['foto']['name'])) { 
			    $config['upload_path']          = './assets/upload/mhs/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2024;
                $config['max_width']            = 2024;
                $config['max_height']           = 2024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto')){
                    $data = array(  'title'       => 'Edit Data Mahasiswa'.$mahasiswa->nama_mhs,
                                    'mahasiswa'   => $mahasiswa,
                                    'dosen'       => $dosen,
                                    'error'       => $this->upload->display_errors(),
                                    'isi'         => 'admin/admin1_KorTA/mahasiswa/edit'
                                );
                        $this->load->view('admin/layout/wrapper',$data);
                }else{
                    $upload_foto = array('upload_foto' => $this->upload->data());

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/mhs/image/'.$upload_foto['upload_foto']['file_name'];
                    $config['new_image']        = './assets/upload/mhs/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['thumb_marker']     = '';
                    $config['width']            = 250;
                    $config['height']           = 250;
                    
                    $this->load->library('image_lib', $config);
                    
                    $this->image_lib->resize();

                    if ($mahasiswa->foto != "") {
                        unlink('./assets/upload/mhs/image/'.$mahasiswa->foto);
                        unlink('./assets/upload/mhs/image/thumbs/'.$mahasiswa->foto);
                    }

                    $i    = $this->input;
                    if(strlen($i->post('password')) > 8) {
                        $data = array('id_mhs'        => $id_mhs,
                                    'nama_mhs'        => $i->post('nama'),
                                    'password'        => sha1($i->post('password')),
                                    'email'           => $i->post('email'),
                                    'angkatan'        => $i->post('angkatan'),
                                    'id_dosen1'        => $i->post('dospem1'),
                                    'nim'             => $i->post('nim'),
                                    'foto'            => $upload_foto['upload_foto']['file_name']
                                    );
                        $this->mhs_model->edit($data);
                        $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                        redirect(base_url('admin/admin1/mahasiswa'));
                    }else {
                        $data = array('id_mhs'        => $id_mhs,
                                    'nama_mhs'        => $i->post('nama'),
                                    'email'           => $i->post('email'),
                                    'angkatan'        => $i->post('angkatan'),
                                    'id_dosen1'        => $i->post('dospem1'),
                                    'id_dosen2'        => $i->post('dospem2'),
                                    'nim'             => $i->post('nim'),
                                    'foto'            => $upload_foto['upload_foto']['file_name']
                                    );
                        $this->mhs_model->edit($data);
                        $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                        redirect(base_url('admin/admin1/mahasiswa'));
                    }
                }
            }else{
                $i    = $this->input;
                $data = array(  'id_mhs'          => $id_mhs,
                                'nama_mhs'        => $i->post('nama'),
                                'email'           => $i->post('email'),
                                'angkatan'        => $i->post('angkatan'),
                                'id_dosen1'        => $i->post('dospem1'),
                                'nim'             => $i->post('nim')
                                );
                $this->mhs_model->edit($data);
                $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                redirect(base_url('admin/admin1/mahasiswa'));
            }
        }   

        $data = array(  'title'     => 'Edit Data Mahasiswa'.$mahasiswa->nama_mhs,
                        'mahasiswa' => $mahasiswa,
                        'dosen'     => $dosen,
                        'isi'       => 'admin/admin1_KorTA/mahasiswa/edit'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }


    public function hapus($id_mhs){
        $mahasiswa = $this->mhs_model->detail($id_mhs);
            unlink('./assets/upload/mhs/image/'.$mahasiswa->foto);
            unlink('./assets/upload/mhs/image/thumbs/'.$mahasiswa->foto);
        $data = array('id_mhs'  => $id_mhs);
        $this->mhs_model->hapus($data);
        $this->session->set_flashdata('SUKSES','Data Mahasiswa Telah Dihapus');
        redirect(base_url('admin/admin1/mahasiswa'));
        }
 
}