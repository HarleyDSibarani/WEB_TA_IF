<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('tingkat_admin') != 1 && $this->session->userdata('tingkat_admin') != 2) {
			$this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
			redirect(base_url('admin/admin'),'refresh');
		}
			$this->load->model('syarat_model');
			$this->load->model('dosen_model');
			$this->load->model('mhs_model');
			$this->load->model('sidang_model');
			$this->load->model('seminar_model');
	}

	public function index(){
		$syarat = $this->syarat_model->listing();
		
		$valid = $this->form_validation;
        $valid->set_rules('isi','Isi','required',
							array('required' => 'Harus Diisi'));
							
		if ($valid->run()===FALSE) {
			$data = array(	'title'     => 'Edit Persyaratan',
							'syarat' 	=> $syarat,
							'isi'       => 'admin/syarat/list'
							);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$i    = $this->input;
			$data = array(	'id_syarat'		=> $syarat->id_syarat,
							'isi_syarat'    => $i->post('isi')
						);
						
			$this->syarat_model->edit($data);
			$this->session->set_flashdata('SUKSES','Data Telah Diedit');
			redirect(base_url('admin/syarat'),'refresh');
		}
	}

	public function upload_dok(){
		$dokumen = $this->syarat_model->list_dokumen();
		
		$valid = $this->form_validation;
        $valid->set_rules('judul','Judul','required',
                            array('required' => 'Judul Harus Diisi'));          

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/dosen/file/';
            $config['allowed_types']        = 'pdf|doc|docx|xlsx|xls';
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('file')){
               
                $data = array(  'title'       	=> 'Dokumen Tugas Akhir',
                                'dokumen'       => $dokumen,
                                'error'       	=> $this->upload->display_errors(),
                                'isi'           => 'admin/syarat/upload'
							);
                $this->load->view('admin/layout/wrapper',$data ,FALSE);
            }else{
                $upload_file = array('upload_file' => $this->upload->data());

                $i    = $this->input;
                $data = array('judul'		    => $i->post('judul'),
                			  'file'         	=> $upload_file['upload_file']['file_name'],
							  'tgl_upload'		=> date('Y-m-d', strtotime('now'))

				);
				$this->syarat_model->tambah_dokumen($data);
                $this->session->set_flashdata('SUKSES','Tambah Berhasil');
                redirect(base_url('admin/syarat/upload_dok'));
            }
        }

        $data = array(  'title'       	=> 'Dokumen Tugas Akhir',
                        'dokumen'       => $dokumen,
                        'isi'           => 'admin/syarat/upload'
                    );
        $this->load->view('admin/layout/wrapper',$data);
    }

    public function edit_dokumen($id_dokumen){
    	$dokumen = $this->syarat_model->detail($id_dokumen);

        $valid = $this->form_validation;
        $valid->set_rules('judul','Judul','required',
                            array('required' => 'Judul Harus Diisi'));  

        if ($valid->run()) {

            if (!empty($_FILES['file']['name'])) { 
                $config['upload_path']          = './assets/upload/dosen/file/';
				$config['allowed_types']        = 'pdf|doc|docx|xlsx|xls';
           		$config['max_size']             = 2024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file')){
                    $data = array(  'title'       	=> 'Dokumen Tugas Akhir',
                                	'dokumen'       => $dokumen,
                                	'error'       	=> $this->upload->display_errors(),
                                	'isi'           => 'admin/syarat/upload'
							);
                $this->load->view('admin/layout/wrapper',$data ,FALSE);
                }else{
                    $upload_file = array('upload_file' => $this->upload->data());

                    if ($dokumen->file != "") {
                        unlink('./assets/upload/dosen/file/'.$dokumen->file);
                    }

                    $i    = $this->input;
                    $data = array('id_dokumen'      => $id_dokumen,
                                  'judul'		    => $i->post('judul'),
                			  	  'file'         	=> $upload_file['upload_file']['file_name'],
							  	  'tgl_upload'		=> date('Y-m-d', strtotime('now'))
                                );
                    $this->syarat_model->edit_dokumen($data);
                    $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                    redirect(base_url('admin/syarat/upload_dok'));
                }
            }else{
                $i    = $this->input;
                $data = array('id_dokumen'      => $id_dokumen,
                              'judul'		    => $i->post('judul'),
						  	  'tgl_upload'		=> date('Y-m-d', strtotime('now'))
                            );
                $this->syarat_model->edit_dokumen($data);
                $this->session->set_flashdata('SUKSES','Data Telah Diedit');
                redirect(base_url('admin/syarat/upload_dok'));
            }
        }   

        $data = array(  'title'       	=> 'Dokumen Tugas Akhir',
                    	'dokumen'       => $dokumen,
                    	'isi'           => 'admin/syarat/upload'
				);
    	$this->load->view('admin/layout/wrapper',$data ,FALSE);
    }

    public function hapus_dokumen($id_dokumen){
		$dokumen = $this->syarat_model->detail($id_dokumen);

    	unlink('./assets/upload/dosen/file/'.$dokumen->file);
    	
        $data = array('id_dokumen'  => $id_dokumen);
        $this->syarat_model->hapus_dokumen($data);
        $this->session->set_flashdata('SUKSES','Dokumens Telah Dihapus');
        redirect(base_url('admin/syarat/upload_dok'));
    }

}

