<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('dosen_model');
        $this->load->model('mhs_model');
        $this->load->model('syarat_model');
        $this->load->model('seminar_model');
        $this->load->model('sidang_model');
	}

	public function index(){
        if ($this->session->userdata('username_mhs')) {
                    redirect(base_url('mahasiswa/welcome'),'refresh');
                }
        $dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
        $beban1 = $this->dosen_model->beban1();
        $beban2 = $this->dosen_model->beban2();
        $mahasiswa = $this->mhs_model->listing();
        $syarat = $this->syarat_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $proposal = $this->seminar_model->list_jadwal_seminar_proposal();
        $hasil = $this->seminar_model->list_jadwal_seminar_hasil();
        $sidang = $this->sidang_model->listing();
        $peserta = $this->sidang_model->peserta();
        
		$data = array(  'title'       			=> 'Sistem Informasi Management Tugas Akhir Teknik Indormatika',
                        'mahasiswa'   			=> $mahasiswa,
                        'dosen_pembimbing_1'    => $dosen,
                        'peserta'               => $peserta,
						'dosen_pembimbing_2'    => $dosen1,
                        'dosen_wali'       		=> $dosen2,
                        'beban1'                => $beban1,
                        'beban2'                => $beban2,
                        'syarat'           		=> $syarat,
                        'proposal'              => $proposal,
                        'hasil'                 => $hasil,
                        'sidang'                => $sidang,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'home/home'
                        );
        $this->load->view('home/layout/wrapper',$data);
    }

    public function daftar_ta(){
        if ($this->session->userdata('username_mhs')) {
                    redirect(base_url('mahasiswa/welcome'),'refresh');
                }
        $dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
        $mahasiswa = $this->mhs_model->listing();
        $syarat = $this->syarat_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $peserta = $this->sidang_model->peserta();

		$valid = $this->form_validation;
        
        $valid->set_rules('nama','Nama','required',
                            array('required' => 'Nama Harus Diisi'));
        $valid->set_rules('username','Username','required|is_unique[admin.username]',
                            array('required'  => 'username Harus Diisi',
                                  'is_unique' => 'Username <Strong>'.$this->input->post('username').'/Strong Sudah Ada. Buat Username Baru'
                                ));
        $valid->set_rules('password','Password','required|max_length[32]|min_length[8]',
                            array('required'    => 'Password Harus Diisi',
                                    'min_length'  => 'Password Minimal 8 karakter',
                                    'max_length'  => 'Password Maksimal 16 karakter',));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => 'Email Harus Diisi',
                                  'valid_email' => 'Email Tidak Valid'));  
        $valid->set_rules('judul','Judul','required',
                            array('required' => 'Judul Harus Diisi'));  
        $valid->set_rules('angkatan','Angkatan','required',
                            array('required'    => 'Angkatan Harus Diisi'));
        $valid->set_rules('doswal','Dosen Wali','required',
							array('required'    => 'Dosen Wali Harus Diisi'));
		$valid->set_rules('dospem1','Dosen Pembimbing 1','required',
                            array('required'    => 'Dosen Pembimbing 1 Harus Diisi'));
		$valid->set_rules('dospem2','Dosen pembimbing 2','required',
                            array('required'    => 'Dosen Pembimbing 2 Harus Diisi'));
        $valid->set_rules('nim','NIM','required',
                            array('required' => 'NIM Harus Diisi'));              

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/mhs/file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('form')){
                
                $data = array(  'title'       			=> 'Daftar Peserta Tugas Akhir',
                                'mahasiswa'   			=> $mahasiswa,
                                'peserta'               => $peserta,
								'dosen_pembimbing_1'    => $dosen,
								'dosen_pembimbing_2'    => $dosen1,
                                'dosen_wali'       		=> $dosen2,
                                'syarat'           		=> $syarat,
                                'dokumen'               => $dokumen,
                                'error'       			=> $this->upload->display_errors(),
                                'isi'                   => 'home/daftar_ta'
							);
                $this->load->view('home/layout/wrapper',$data);
            }else{
                $upload_dok = array('upload_dok' => $this->upload->data());

                $i    = $this->input;
                $data = array('nama_mhs'        => $i->post('nama'),
                              'username'        => $i->post('username'),
                              'password'        => sha1($i->post('password')),
                              'email'           => $i->post('email'),
                              'judul'           => $i->post('judul'),
                              'id_dospem1'      => $i->post('dospem1'),
                              'id_dospem2'      => $i->post('dospem2'),
                              'angkatan'        => $i->post('angkatan'),			  
							  'id_dosen_wali'   => $i->post('doswal'),
                              'nim'             => $i->post('nim'),
                              'foto'            => $i->post('foto'),
                              'dokumen'         => $upload_dok['upload_dok']['file_name'],
                              'id_tingkatan'    => $i->post('id_tingkatan'),
                              'status'          => $i->post('status'),
							  'tgl_daftar'		=> date('Y-m-d', strtotime('now'))

				);
				$this->mhs_model->tambah($data);
                $this->session->set_flashdata('SUKSES','Pendaftaran Berhasil Silahkan Tunggu Validasi, Cek Daftar Peserta Berkala');
                redirect(base_url('welcome/daftar_ta'),'refresh');
            }
        }

        $data = array(  'title'       			=> 'Sistem Informasi Management Tugas Akhir Teknik Indormatika',
                        'mahasiswa'   			=> $mahasiswa,
                        'peserta'               => $peserta,
                        'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
                        'dosen_wali'       		=> $dosen2,
                        'syarat'           		=> $syarat,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'home/daftar_ta'
                    );
        $this->load->view('home/layout/wrapper',$data);
    }

    public function peserta(){
        if ($this->session->userdata('username_mhs')) {
                    redirect(base_url('mahasiswa/welcome'),'refresh');
                }
        $dosen = $this->dosen_model->list_dospem1();
		$dosen1 = $this->dosen_model->list_dospem2();
		$dosen2 = $this->dosen_model->list_dosen_wali();
        $mahasiswa = $this->sidang_model->peserta();
        $syarat = $this->syarat_model->listing();
        $dokumen = $this->syarat_model->list_dokumen();
        $peserta = $this->sidang_model->peserta();

        $data = array(  'title'                 => 'Daftar Peserta Tugas Akhir 1',
                        'mahasiswa'   			=> $mahasiswa,
                        'peserta'               => $peserta,
                        'dosen_pembimbing_1'    => $dosen,
						'dosen_pembimbing_2'    => $dosen1,
                        'dosen_wali'       		=> $dosen2,
                        'syarat'           		=> $syarat,
                        'dokumen'               => $dokumen,
                        'isi'                   => 'home/peserta'
                
                    );
        $this->load->view('home/layout/wrapper',$data);
    }
}
