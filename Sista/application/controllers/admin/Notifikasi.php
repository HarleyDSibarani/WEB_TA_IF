<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login_admin->check_admin();
		$this->load->model('dosen_model');
		$this->load->model('mhs_model');
		$this->load->model('sidang_model');
		$this->load->model('seminar_model');
	}
	
	public function index(){
		$dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
		$mahasiswa = $this->mhs_model->list_daftar();
		$proposal = $this->seminar_model->list_daftar_seminar_proposal();
		$hasil = $this->seminar_model->list_daftar_seminar_hasil();
		$sidang = $this->sidang_model->list_daftar_sidang();
        
		$data = array(  'title'     			=> 'Mahasiswa Daftar Tugas Akhir 1',
						'title1'     			=> 'Mahasiswa Daftar Seminar Proposal',
						'title2'     			=> 'Mahasiswa Daftar Seminar Hasil',
						'title3'     			=> 'Mahasiswa Daftar Sidang',
						'mahasiswa'   			=> $mahasiswa,
						'sidang'				=> $sidang,
						'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'	=> $dosen1,
                        'proposal'              => $proposal,
                        'hasil'                 => $hasil,
						'dosen_wali'       		=> $dosen2,
		                'isi'      				=> 'admin/notifikasi/list'
	            );
		$this->load->view('admin/layout/wrapper',$data);

	}

	public function edit($id_mhs){
		$mahasiswa = $this->mhs_model->detail($id_mhs);
        
        $valid = $this->form_validation;
		$valid->set_rules('status','Status','required',
                            array('required'    => 'Status Harus Diisi Atau Close'));

        if ($valid->run()===FALSE) {
		    $data = array(  'title'     			=> 'Mahasiswa Daftar Tugas Akhir 1',
							'mahasiswa'   			=> $mahasiswa,
			                'isi'      				=> 'admin/notifikasi/edit'
	                );
			$this->load->view('admin/layout/wrapper',$data);

        }else {
            $i    = $this->input;
	        $data = array('id_mhs'        => $id_mhs,
	                      'status'        => $i->post('status')  
	                    );

            $this->mhs_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/notifikasi'));
        }
	}

	public function edit_seminar_proposal($id_seminar_proposal){
		$proposal = $this->seminar_model->detail_proposal($id_seminar_prooposal);
        
        $valid = $this->form_validation;
		$valid->set_rules('status','Status','required',
                            array('required'    => 'Status Harus Diisi Atau Close'));

        if ($valid->run()===FALSE) {
		    $data = array(  
							'proposal'   			=> $proposal,
			                'isi'      				=> 'admin/notifikasi/edit_seminar_proposal'
	                );
			$this->load->view('admin/layout/wrapper',$data);

        }else {
            $i    = $this->input;
	        $data = array('id_seminar_proposal' => $id_seminar_proposal,
	                      'status'    		    => $i->post('status')  
	                    );

            $this->seminar_model->edit_proposal($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/notifikasi'));
        }
	}

	public function edit_seminar_hasil($id_seminar_hasil){
		$hasil = $this->seminar_model->detail_hasil($id_seminar_hasil);
        
        $valid = $this->form_validation;
		$valid->set_rules('status','Status','required',
                            array('required'    => 'Status Harus Diisi Atau Close'));

        if ($valid->run()===FALSE) {
		    $data = array(  
							'hasil'   			=> $hasil,
			                'isi'      				=> 'admin/notifikasi/edit_seminar_hasil'
	                );
			$this->load->view('admin/layout/wrapper',$data);

        }else {
            $i    = $this->input;
	        $data = array('id_seminar_hasil'    => $id_seminar_hasil,
	                      'status'        		=> $i->post('status')  
	                    );

            $this->seminar_model->edit_hasil($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/notifikasi'));
        }
	}

	public function edit_sidang($id_sidang){
		$seminar = $this->sidang_model->detail($id_sidang);
        
        $valid = $this->form_validation;
		$valid->set_rules('status','Status','required',
                            array('required'    => 'Status Harus Diisi Atau Close'));

        if ($valid->run()===FALSE) {
		    $data = array(  
							'mahasiswa'   			=> $Seminar,
			                'isi'      				=> 'admin/notifikasi/edit_sidang'
	                );
			$this->load->view('admin/layout/wrapper',$data);

        }else {
            $i    = $this->input;
	        $data = array('id_mhs'        => $id_mhs,
	                      'status'        => $i->post('status')  
	                    );

            $this->sidang_model->edit($data);
            $this->session->set_flashdata('SUKSES','Data Telah Diedit');
            redirect(base_url('admin/notifikasi'));
        }
	}
}