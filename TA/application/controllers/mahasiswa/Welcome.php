<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('dosen_model');
		$this->load->model('mhs_model');
	}

	public function index(){
		$dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
		$mahasiswa = $this->mhs_model->listing();

		$valid = $this->form_validation;
        
        $valid->set_rules('angkatan','Angkatan','required',
                            array('required'    => 'Angkatan Harus Diisi'));
        $valid->set_rules('doswal','Dosen Wali','required',
							array('required'    => 'Dosen Pembimbing Harus Diisi'));
		$valid->set_rules('dospem1','Dosen Pembimbing 1','required',
                            array('required'    => 'Dosen Pembimbing Harus Diisi'));
		$valid->set_rules('dospem2','Dosen pembimbing 2','required',
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
                
                $data = array(  'title'       			=> 'Tambah Data Mahasiswa Tugas Akhir',
                                'mahasiswa'   			=> $mahasiswa,
								'dosen_pembimbing_1'    => $dosen,
								'dosen_pembimbing_2'    => $dosen1,
								'dosen_wali'       		=> $dosen2,
                                'error'       			=> $this->upload->display_errors()
							);
				$data1 = array(
					'id_dospem1'     => $i->post('dospem1'),
					'id_dospem2'     => $i->post('dospem2'),
					'id_dosen_wali'  => $i->post('doswal'),
					'tgl_daftar'		=> date('d-m-Y', strtotime('now'))
				);		
                    $this->load->view('mahasiswa/home',$data);
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
                $data = array('nama_mhs'        => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'password'        => sha1($i->post('password')),
                              'email'           => $i->post('email'),
                              'angkatan'        => $i->post('angkatan'),			  
							  'id_dosen_wali'   => $i->post('doswal'),
                              'nim'             => $i->post('nim'),
                              'foto'            => $upload_foto['upload_foto']['file_name']
							);
				$data1 = array(
							   'id_dospem1'     => $i->post('dospem1'),
						       'id_dospem2'     => $i->post('dospem2'),
							   'id_dosen_wali'  => $i->post('doswal'),
							   'tgl_daftar'		=> date('d-m-Y', strtotime('now'))

				);
				$this->mhs_model->tambah($data);
				$this->mhs_model->tambah1($data1);
                $this->session->set_flashdata('SUKSES','Data Telah Ditambahkan');
                redirect(base_url('mahasiswa/home'),'refresh');
            }
        }

        $data = array(  'title'       			=> 'Sistem Informasi Management Tugas Akhir Teknik Indormatika',
                        'mahasiswa'   			=> $mahasiswa,
                        'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
						'dosen_wali'       		=> $dosen2
                    );
        $this->load->view('mahasiswa/home',$data);
    }
	
}
