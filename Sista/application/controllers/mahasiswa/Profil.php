    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login_mhs->check();
		if ($this->session->userdata('status') != 1) {
                    $this->session->set_flashdata('sukses','Anda Belum Divalidasi');
                    redirect(base_url('login_mhs'),'refresh');
                }
		$this->load->model('dosen_model');
		$this->load->model('mhs_model');
		$this->load->model('sidang_model');
		$this->load->model('seminar_model');
		$this->load->model('bimbingan_model');
	}
	
	public function index(){
		$mhs = $this->mhs_model->profil();
		$wali = $this->dosen_model->list_dosen_wali();
		$dosen1 = $this->dosen_model->list_dospem1();
		$dosen2 = $this->dosen_model->list_dospem2();
	
		$bimbingan = $this->bimbingan_model->listing();
        $data = array(  'title'     			=> 'Profil Mahasisawa',
						'mhs'     				=> $mhs,
						'bimbingan'				=> $bimbingan,
						'wali'					=> $wali,
						'dosen_pembimbing_1'	=> $dosen1,
						'dosen_pembimbing_2'	=> $dosen2,
                        'isi'       			=> 'mahasiswa/profil'
                        );
		$this->load->view('mahasiswa/profil',$data);
	}

	public function edit_profil($id_mhs){
		$mahasiswa = $this->mhs_model->detail($id_mhs);

        if (!empty($_FILES['foto']['name'])) { 
            $config['upload_path']          = './assets/upload/mhs/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2024;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto')){
                $data = array(  'title'     	=> 'Edit Profil ( '.$mahasiswa->nama_mhs.' )',
                                'mahasiswa'    	=> $mahasiswa,
                                'error'     	=> $this->upload->display_errors(),
                                'isi'       	=> 'mahasiswa/profil'
                            );
                $this->load->view('mahasiswa/profil',$data);
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

                if ($mahasiswa->foto != "default.png") {
                    unlink('./assets/upload/mhs/image/'.$mahasiswa->foto);
                    unlink('./assets/upload/mhs/image/thumbs/'.$mahasiswa->foto);
                }

                $i    = $this->input;
                if(strlen($i->post('password')) > 8) {	               
	                $data = array('id_mhs'      	=> $id_mhs,
	                              'password'     	=> sha1($i->post('password')),
	                              'foto'            => $upload_foto['upload_foto']['file_name']
	                            );
	            }else{
	            	$data = array('id_mhs'      	=> $id_mhs,
	                              'foto'            => $upload_foto['upload_foto']['file_name']
	                            );
	            }
                $this->mhs_model->edit($data);
                $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                redirect(base_url('mahasiswa/profil'));
            }
        }else{
            $i    = $this->input;
	        $data = array(  'id_mhs'      	=> $id_mhs,
	                        'password'     	=> sha1($i->post('password')),
	                    );
            $this->mhs_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('mahasiswa/profil'));
        }
	}

	public function upload_skripsi($id_mhs){
		$mahasiswa = $this->mhs_model->detail($id_mhs);

        $config['upload_path']          = './assets/upload/mhs/file/';
        $config['allowed_types']        = 'pdf|doc|docx|xlsx|xls';
        $config['max_size']             = 2024;

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('dokumen')){
           
            $data = array(  'title'       	=> 'Dokumen Tugas Akhir',
                            'mahasiswa'     => $mahasiswa,
                            'error'       	=> $this->upload->display_errors(),
                            'isi'       	=> 'mahasiswa/profil'
                            );
            $this->load->view('mahasiswa/profil',$data);
        }else{
            $upload_file = array('upload_file' => $this->upload->data());

            $i    = $this->input;
            $data = array('id_mhs'      	=> $id_mhs,
                          'dokumen'     	=> $upload_file['upload_file']['file_name']
                        );
			$this->mhs_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Berhasil Diupload');
            redirect(base_url('mahasiswa/profil'));
        }
    }
}