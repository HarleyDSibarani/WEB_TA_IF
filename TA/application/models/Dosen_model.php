<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function list_dosen_wali(){
        $query = $this->db->get('dosen_wali');
        return $query->result();
    }

    public function list_dospem1(){
        $query = $this->db->get('dosen_pembimbing_1');
        return $query->result();
    }

    public function list_dospem2(){
        $query = $this->db->get('dosen_pembimbing_2');
        return $query->result();
    }

    public function detail1($id_dospem1){
        $query = $this->db->get_where('dosen_pembimbing_1',array('id_dospem1' => $id_dospem1));
        return $query->row();
    }

    public function detail2($id_dospem2){
        $query = $this->db->get_where('dosen_pembimbing_2',array('id_dospem2' => $id_dospem2));
        return $query->row();
    }

    public function detail_wali($id_dosen_wali){
        $query = $this->db->get_where('dosen_wali',array('id_dosen_wali' => $id_dosen_wali));
        return $query->row();
    }

    public function read1($id_dospem1){
        $query = $this->db->get_where('dosen_pembimbing_1',array('id_dospem1' => $id_dospem1));
        return $query->row();
    }

    public function read2($id_dospem2){
        $query = $this->db->get_where('dosen_pembimbing_2',array('id_dospem2' => $id_dospem2));
        return $query->row();
    }

    public function tambah1($data){
        $this->db->insert('dosen_pembimbing_1',$data);
    }

    public function tambah2($data){
        $this->db->insert('dosen_pembimbing_2',$data);
    }

    public function tambah_wali($data){
        $this->db->insert('dosen_wali',$data);
    }

    public function edit1($data){
        $this->db->where('id_dospem1',$data['id_dospem1']);
        $this->db->update('dosen_pembimbing_1',$data);
    }

    public function edit2($data){
        $this->db->where('id_dospem2',$data['id_dospem2']);
        $this->db->update('dosen_pembimbing_2',$data);
    }

    public function edit_wali($data){
        $this->db->where('id_dosen_wali',$data['id_dosen_wali']);
        $this->db->update('dosen_wali',$data);
    }

    public function hapus1($data){
        $this->db->where('id_dospem1',$data['id_dospem1']);
        $this->db->delete('dosen_pembimbing_1',$data);
    }

    public function hapus2($data){
        $this->db->where('id_dospem2',$data['id_dospem2']);
        $this->db->delete('dosen_pembimbing_2',$data);
    }

    public function hapus_wali($data){
        $this->db->where('id_dosen_wali',$data['id_dosen_wali']);
        $this->db->delete('dosen_wali',$data);
    }
}