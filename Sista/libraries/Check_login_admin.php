<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Check_login_admin {
        protected $CI;

    
    public function __construct(){
        $this->CI =& get_instance();
    }

    public function check_admin(){
        if (($this->CI->session->userdata('username_admin') == "" && $this->CI->session->userdata('username_dospem1') == "" && $this->CI->session->userdata('username_dospem2') == "") && $this->CI->session->userdata('tingkat_admin') == "") {
            $this->CI->session->set_flashdata('sukses','Silahkan Login Dahulu');
            redirect(base_url('login_admin'),'refresh');
        }
    }

    public function logout_admin(){
        $this->CI->session->unset_userdata('username_admin');
        $this->CI->session->unset_userdata('username_dospem1');
        $this->CI->session->unset_userdata('username_dospem2');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('tingkat_admin');
        $this->CI->session->unset_userdata('id_admin');
        $this->CI->session->unset_userdata('id_dospem1');
        $this->CI->session->unset_userdata('id_dospem2');
        $this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
        redirect(base_url('login_admin'),'refresh');
    }
}