<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $query = $this->db->get('syarat');
        return $query->result();;
    }

    public function detail($id_syarat){
        $query = $this->db->get_where('syarat',array('id_syarat' => $id_syarat));
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('syarat',$data);
    }

    public function edit($data){
        $this->db->where('id_syarat',$data['id_syarat']);
        $this->db->update('syarat',$data);
    }

    public function hapus($data){
        $this->db->where('id_syarat',$data['id_syarat']);
        $this->db->delete('syarat',$data);
    }
}