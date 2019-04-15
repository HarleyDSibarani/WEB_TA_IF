<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $query = $this->db->get('dosen');
        return $query->result();
    }

    public function profil(){
        $query = $this->db->get('dosen');
        return $query->result();
    }

    public function detail($id_dosen){
        $query = $this->db->get_where('dosen',array('id_dosen' => $id_dosen));
        return $query->row();
    }

    public function read($id_dosen){
        $query = $this->db->get_where('dosen',array('id_dosen' => $id_dosen));
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('dosen',$data);
    }

    public function edit($data){
        $this->db->where('id_dosen',$data['id_dosen']);
        $this->db->update('dosen',$data);
    }

    public function hapus($data){
        $this->db->where('id_dosen',$data['id_dosen']);
        $this->db->delete('dosen',$data);
    }
}