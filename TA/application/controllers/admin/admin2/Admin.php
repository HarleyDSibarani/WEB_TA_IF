<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
                parent::__construct();
                $this->load->model('admin_model');
                $this->load->model('tingkatan_model');
    }

    public function index(){
        $admin = $this->admin_model->listing();
        $data = array(  'title'     => 'Data Adminstrator',
                        'admin'     => $admin,
                        'isi'       => 'admin/admin2_SekKorTA/dasbor/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }
 
}