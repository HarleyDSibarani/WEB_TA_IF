<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mhs extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('mhs_model');
        $this->load->model('tingkatan_model');
    }

    public function index(){
        if ($this->session->userdata('username_mhs')) {
                    redirect(base_url('mahasiswa/welcome'),'refresh');
                }
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required',
                        array('required' => 'username Harus Diisi'));;

        $this->form_validation->set_rules('password','Password','required',
                        array('required' => 'Password Harus Diisi'));
                        

        if ($this->form_validation->run()=== FALSE) {
            $data = array(  'title'     => 'Login Mahasiswa' );
            $this->load->view('mahasiswa/login_mhs',$data,FALSE);
        
        }else{
            $username       = $this->input->post('username');
            $password       = $this->input->post('password');

            $check_login    = $this->mhs_model->login($username,$password);

            if (count($check_login) == 1) {   
                $this->session->set_userdata('username_mhs', $username);
                $this->session->set_userdata('nama_mhs', $check_login->nama_mhs);
                $this->session->set_userdata('nim', $check_login->nim);
                $this->session->set_userdata('status', $check_login->status);
                $this->session->set_userdata('mhs', $check_login->id_tingkatan);
                $this->session->set_userdata('judul', $check_login->judul);
                $this->session->set_userdata('id_dosen_wali', $check_login->id_dosen_wali);
                $this->session->set_userdata('id_dospem1', $check_login->id_dospem1);
                $this->session->set_userdata('id_dospem2', $check_login->id_dospem2);
                $this->session->set_userdata('id_mhs', $check_login->id_mhs);
                if ($check_login->id_tingkatan == 4) {
                    redirect(base_url('mahasiswa/welcome'),'refresh');
                }else{
                    $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
                    redirect(base_url('login_mhs'),'refresh');
                }
            
            }else {
                $this->session->set_flashdata('sukses','Username/password salah');
                redirect(base_url('login_mhs'),'refresh');
            }
        }
    }

    public function logout_mhs(){
        $this->check_login_mhs->logout_mhs();
    }
}