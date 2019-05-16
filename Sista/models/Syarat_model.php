<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat_model extends CI_Model {    

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function listing(){
        $query = $this->db->get('ta_syarat');
        return $query->row();    
    }

    public function edit($data){
            $this->db->where('id_syarat',$data['id_syarat']);
            $this->db->update('ta_syarat',$data);
    }

    public function list_dokumen(){
        $query = $this->db->get('ta_dokumen');
        return $query->result();    
    }

    public function tambah_dokumen($data){
        $this->db->insert('ta_dokumen',$data);
    }

    public function detail($id_dokumen){
        $query = $this->db->get_where('ta_dokumen',array('id_dokumen' => $id_dokumen));
        return $query->row();
    }

    public function edit_dokumen($data){
        $this->db->where('id_dokumen',$data['id_dokumen']);
        $this->db->update('ta_dokumen',$data);
    }

    public function hapus_dokumen($data){
        $this->db->where('id_dokumen',$data['id_dokumen']);
        $this->db->delete('ta_dokumen',$data);
    }

}