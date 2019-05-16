    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seminar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login_mhs->check();
		if ($this->session->userdata('status') != 1) {
                    $this->session->set_flashdata('sukses','Anda Belum Divalidasi');
                    redirect(base_url('login_mhs'),'refresh');
                }
		$this->load->model('seminar_model');
		$this->load->model('mhs_model');
		$this->load->model('syarat_model');
		$this->load->model('bimbingan_model');
        $this->load->model('sidang_model');
	}

	public function daftar_seminar_proposal(){
		$mahasiswa = $this->mhs_model->listing();
		$seminar = $this->seminar_model->list_proposal();
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
		$valid->set_rules('ruangan','Ruangan','required',
							array('required' => 'Ruangan Harus Diisi'));
		$valid->set_rules('jenis','Jenis Seminar','required',
							array('required' => 'Jenis Seminar Harus Diisi'));
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
                
                $data = array(  'title'       			=> 'Daftar Seminar Proposal',
								'mahasiswa'   			=> $mahasiswa,
                                'peserta'               => $peserta,
								'seminar'				=> $seminar,
                                'syarat'           		=> $syarat,
                                'dokumen'               => $dokumen,
                                'error'       			=> $this->upload->display_errors(),
                                'isi'                   => 'mahasiswa/proposal'
							);
                $this->load->view('mahasiswa/layout/wrapper',$data);
            }else{
                $upload_dok = array('upload_dok' => $this->upload->data());

                $i    = $this->input;
                $data = array('nama_mhs'             => $i->post('nama'),
                              'judul'                => $i->post('judul'),
                              'nim'                  => $i->post('nim'),
                              'file'	             => $upload_dok['upload_dok']['file_name'],
							  'jenis'	             => $i->post('jenis'),
							  'ruangan'              => $i->post('ruangan'),
							  'tgl_seminar_proposal' => $i->post('tanggal'),
							  'waktu'			     => $i->post('waktu'),
							  'status'			     => $i->post('status'),
                              'id_dospem1'           => $i->post('dospem1'),
                              'id_dospem2'           => $i->post('dospem2')

				);
				$this->seminar_model->tambah_proposal($data);
                $this->session->set_flashdata('SUKSES','Pendaftaran Berhasil Silahkan Tunggu Validasi, Cek Profil Berkala');
                redirect(base_url('mahasiswa/seminar/daftar_seminar_proposal'),'refresh');
            }
        }

        $data = array(  'title'       			=> 'Daftar Seminar Proposal',
						'mahasiswa'   			=> $mahasiswa,
						'seminar'				=> $seminar,
                        'syarat'           		=> $syarat,
                        'dokumen'               => $dokumen,
                        'peserta'               => $peserta,
                        'isi'                   => 'mahasiswa/proposal'
                    );
        $this->load->view('mahasiswa/layout/wrapper',$data);
    }

    public function daftar_seminar_hasil(){
        $mahasiswa = $this->mhs_model->listing();
        $seminar = $this->seminar_model->list_hasil();
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
        $valid->set_rules('ruangan','Ruangan','required',
                            array('required' => 'Ruangan Harus Diisi'));
        $valid->set_rules('jenis','Jenis Seminar','required',
                            array('required' => 'Jenis Seminar Harus Diisi'));
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
                
                $data = array(  'title'                 => 'Daftar Seminar Hasil',
                                'mahasiswa'             => $mahasiswa,
                                'peserta'               => $peserta,
                                'seminar'               => $seminar,
                                'syarat'                => $syarat,
                                'dokumen'               => $dokumen,
                                'error'                 => $this->upload->display_errors(),
                                'isi'                   => 'mahasiswa/hasil'
                            );
                $this->load->view('mahasiswa/layout/wrapper',$data);
            }else{
                $upload_dok = array('upload_dok' => $this->upload->data());

                $i    = $this->input;
                $data = array('nama_mhs'            => $i->post('nama'),
                              'judul'               => $i->post('judul'),
                              'nim'                 => $i->post('nim'),
                              'file'                => $upload_dok['upload_dok']['file_name'],
                              'jenis'               => $i->post('jenis'),
                              'ruangan'             => $i->post('ruangan'),
                              'tgl_seminar_hasil'   => $i->post('tanggal'),
                              'waktu'               => $i->post('waktu'),
                              'status'              => $i->post('status'),
                              'id_dospem1'          => $i->post('dospem1'),
                              'id_dospem2'          => $i->post('dospem2')

                );
                $this->seminar_model->tambah_hasil($data);
                $this->session->set_flashdata('SUKSES','Pendaftaran Berhasil Silahkan Tunggu Validasi, Cek Profil Berkala');
                redirect(base_url('mahasiswa/seminar/daftar_seminar_Hasil'),'refresh');
            }
        }

        $data = array(  'title'                 => 'Daftar Seminar Proposal',
                        'mahasiswa'             => $mahasiswa,
                        'peserta'               => $peserta,
                        'seminar'               => $seminar,
                        'syarat'                => $syarat,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'mahasiswa/hasil'
                    );
        $this->load->view('mahasiswa/layout/wrapper',$data);
    }
}