<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing extends CI_Controller {
    public function __construct(){
                parent::__construct();
                $this->load->model('dosen_model');
    }

    public function index(){
        $dosen = $this->dosen_model->listing();
        $data = array(  'title'     => 'Data Dosen Pembimbing',
                        'dosen'     => $dosen,
                        'isi'       => 'admin/admin3_DosPem/dosen_pembimbing/list'
                        );
        $this->load->view('admin/layout/wrapper',$data);
    }
}