<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('dosen_model');
        $this->load->model('mhs_model');
        $this->load->model('tingkatan_model');
    }

    public function index(){
        if ($this->session->userdata('username_admin')) {
            redirect(base_url('admin/admin'),'refresh');
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required',
                        array('required' => 'username Harus Diisi'));;

        $this->form_validation->set_rules('password','Password','required',
                        array('required' => 'Password Harus Diisi'));
                        

        if ($this->form_validation->run()=== FALSE) {
            $data = array(  'title'     => 'Login Administrator' );
            $this->load->view('admin/login_admin',$data,FALSE);
        
        }else{
            $username       = $this->input->post('username');
            $email1          = $this->input->post('username');
            $email2          = $this->input->post('username');
            $password       = $this->input->post('password');

            $check_login_admin    = $this->admin_model->login($username,$password);
            $check_login_dospem1   = $this->dosen_model->login1($email1,$password);
            $check_login_dospem2   = $this->dosen_model->login2($email2,$password);

            if (count($check_login_admin) == 1) {
                $this->session->set_userdata('username_admin', $username);
                $this->session->set_userdata('nama', $check_login_admin->nama);
                $this->session->set_userdata('tingkat_admin', $check_login_admin->id_tingkatan);
                $this->session->set_userdata('id_admin', $check_login_admin->id_admin);
                if ($check_login_admin->id_tingkatan == 1) {
                    redirect(base_url('admin/admin'),'refresh');
                }
                elseif ($check_login_admin->id_tingkatan == 2) {
                    redirect(base_url('admin/dosen_pembimbing_1'),'refresh');
                }else{
                    $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
                    redirect(base_url('login_admin'),'refresh');
                }

            }
            if (count($check_login_dospem1) == 1) {
                $this->session->set_userdata('username_dospem1', $email1);
                $this->session->set_userdata('nama', $check_login_dospem1->nama_dospem);
                $this->session->set_userdata('tingkat_admin', $check_login_dospem1->id_tingkatan);
                $this->session->set_userdata('id_dospem1', $check_login_dospem1->id_dospem1);

                if ($check_login_dospem1->id_tingkatan == 3) {
                    redirect(base_url('admin/bimbingan'),'refresh');
                }else{
                    $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
                    redirect(base_url('login_admin'),'refresh');
                }

            }
            if (count($check_login_dospem2) == 1) {
                $this->session->set_userdata('username_dospem2', $email2);
                $this->session->set_userdata('nama', $check_login_dospem2->nama_dospem);
                $this->session->set_userdata('tingkat_admin', $check_login_dospem2->id_tingkatan);
                $this->session->set_userdata('id_dospem2', $check_login_dospem2->id_dospem2);

                if ($check_login_dospem2->id_tingkatan == 3) {
                    redirect(base_url('admin/bimbingan'),'refresh');
                }else{
                    $this->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses');
                    redirect(base_url('login_admin'),'refresh');
                }

            }else {
                $this->session->set_flashdata('sukses','Username/password salah');
                redirect(base_url('login_admin'),'refresh');
            }
        }
    }

    public function logout_admin(){
        $this->check_login_admin->logout_admin();
    }

}