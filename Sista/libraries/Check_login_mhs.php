<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Check_login_mhs {
        protected $CI;

    
    public function __construct(){
        $this->CI =& get_instance();
    }

    public function check(){
        if ($this->CI->session->userdata('username_mhs') == "" && $this->CI->session->userdata('tingkatan') == "") {
            $this->CI->session->set_flashdata('sukses','Silahkan Login Dahulu');
            redirect(base_url('login_mhs'),'refresh');
        }
    }

    public function check_mhs(){
        if ($this->CI->session->userdata('tingkatan') == 4) {
            redirect(base_url('mahasiswa/welcome'),'refresh');
        }
    }

    public function logout_mhs(){
        $this->CI->session->unset_userdata('username_mhs');
        $this->CI->session->unset_userdata('nama_mhs');
        $this->CI->session->unset_userdata('tingkatan');
        $this->CI->session->unset_userdata('nim');
        $this->CI->session->unset_userdata('id_mhs');
        $this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
        redirect(base_url(),'refresh');
    }

}