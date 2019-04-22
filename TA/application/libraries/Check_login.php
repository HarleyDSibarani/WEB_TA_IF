<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Check_login {
        protected $CI;

    
    public function __construct(){
        $this->CI =& get_instance();
    }

    public function check(){
        if ($this->CI->session->userdata('username') == "" && $this->CI->session->userdata('tingkatan') == "") {
            $this->CI->session->set_flashdata('sukses','Silahkan Login Dahulu');
            redirect(base_url('login'),'refresh');
        }
    }

    public function logout(){
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('tingkatan');
        $this->CI->session->unset_userdata('id_admin');
        $this->CI->session->unset_userdata('id_mhs');
        $this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
        redirect(base_url('login'),'refresh');
    }

}