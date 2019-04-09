<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model','mhs_model');
    }

    public function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required',
                        array('required' => 'username Harus Diisi'));;

        $this->form_validation->set_rules('password','Password','required',
                        array('required' => 'Password Harus Diisi'));
                        

        if ($this->form_validation->run()=== FALSE) {
            $data = array(  'title'     => 'Login Administrator' );
            $this->load->view('admin/login_view',$data,FALSE);
        
        }else{
            $username       = $this->input->post('username');
            $password       = $this->input->post('password');

            $check_login    = $this->admin_model->login($username,$password);

            if (count($check_login) == 1) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('nama', $check_login->nama);
                $this->session->set_userdata('tingkatan', $check_login->id_tingkatan);
                $this->session->set_userdata('id_admin', $check_login->id_admin);

                redirect(base_url('admin/admin1/admin'),'refresh');
            }else {
                $this->session->set_flashdata('sukses','Username/password salah');
                redirect(base_url('login'),'refresh');
            }
        }
    }

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('tingkatan');
        $this->session->unset_userdata('id_admin');
        $this->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
        redirect(base_url('login'),'refresh');
        
    }
}