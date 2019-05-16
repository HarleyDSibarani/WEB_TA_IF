    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sidang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login_mhs->check();
		if ($this->session->userdata('status') != 1) {
                    $this->session->set_flashdata('sukses','Anda Belum Divalidasi');
                    redirect(base_url('login_mhs'),'refresh');
                }
		$this->load->model('sidang_model');
		$this->load->model('mhs_model');
        $this->load->model('syarat_model');
        $this->load->model('sidang_model');
        
	}
	
	public function daftar_sidang(){
		$mahasiswa = $this->mhs_model->listing();
		$sidang = $this->sidang_model->listing();
        $syarat = $this->syarat_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $peserta = $this->sidang_model->peserta();

		$valid = $this->form_validation;
        
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('judul','Judul','required',
                            array('required' => 'Judul Harus Diisi'));  
		$valid->set_rules('nim','NIM','required',
							array('required' => 'NIM Harus Diisi'));    
		$valid->set_rules('tanggal','Tanggal','required',
							array('required' => 'Tanggal Harus Diisi'));
		$valid->set_rules('waktu','Waktu','required',
							array('required' => 'Waktu Harus Diisi'));              

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/mhs/file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('form')){
                
                $data = array(  'title'       => 'Daftar Sidang Proposal',
								'mahasiswa'   => $mahasiswa,
                                'peserta'     => $peserta,
								'sidang'	  => $sidang,
                                'syarat'      => $syarat,
                                'dokumen'     => $dokumen,
                                'error'       => $this->upload->display_errors(),
                                'isi'         => 'mahasiswa/sidang'
							);
                $this->load->view('mahasiswa/layout/wrapper',$data);
            }else{
                $upload_dok = array('upload_dok' => $this->upload->data());

                $i    = $this->input;
                $data = array('nama_mhs'        => $i->post('nama'),
                              'judul'           => $i->post('judul'),
                              'nim'             => $i->post('nim'),
                              'form'	        => $upload_dok['upload_dok']['file_name'],
							  'tgl_sidang' 		=> $i->post('tanggal'),
							  'waktu'			=> $i->post('waktu'),
							  'status'			=> $i->post('status')

				);
				$this->sidang_model->tambah($data);
                $this->session->set_flashdata('SUKSES','Pendaftaran Berhasil Silahkan Tunggu Validasi, Cek Profil Berkala');
                redirect(base_url('mahasiswa/sidang/daftar_sidang'),'refresh');
            }
        }

        $data = array(  'title'       			=> 'Daftar Sidang Proposal',
						'mahasiswa'   			=> $mahasiswa,
                        'peserta'               => $peserta,
						'sidang'				=> $sidang,
                        'syarat'           		=> $syarat,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'mahasiswa/sidang'
                    );
        $this->load->view('mahasiswa/layout/wrapper',$data);
    }
}