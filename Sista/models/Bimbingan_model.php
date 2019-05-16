<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model extends CI_Model {

	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function listing(){
        $query = $this->db->get('ta_bimbingan');
        return $query->result();    
    }

    public function tambah($data){
        $this->db->insert('ta_bimbingan',$data);
    }

    public function edit($data){
        $this->db->where('id_bimbingan',$data['id_bimbingan']);
        $this->db->update('ta_bimbingan',$data);
    }

}

/* End of file Bimbingan_model.php */
/* Location: ./application/models/Bimbingan_model.php */