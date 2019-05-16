<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

     public function login1($email1, $password){
        $query = $this->db->get_where('ta_dosen_pembimbing_1',array('email'     => $email1,
                                                                 'password'  => sha1($password))
                                                );
        return $query->row();
    }

     public function login2($email2, $password){
        $query = $this->db->get_where('ta_dosen_pembimbing_2',array('email'     => $email2,
                                                                 'password'  => sha1($password))
                                                );
        return $query->row();
    }

    public function list_dosen_wali(){
        $query = $this->db->get('ta_dosen_wali');
        return $query->result();
    }
    public function list_dosen_wali_row(){
        $query = $this->db->get('ta_dosen_wali');
        return $query->row();
    }

    public function list_dospem1(){
        $query = $this->db->get('ta_dosen_pembimbing_1');
        return $query->result();
    }

    public function beban1(){
        $this->db->select('ta_dosen_pembimbing_1.*,count(id_mhs) AS beban1,ta_mahasiswa.id_mhs');
        $this->db->from('ta_dosen_pembimbing_1');
        $this->db->join('ta_mahasiswa','ta_mahasiswa.id_dospem1 = ta_dosen_pembimbing_1.id_dospem1','LEFT');
        $this->db->where('ta_mahasiswa.id_dospem1 = ta_dosen_pembimbing_1.id_dospem1 AND ta_mahasiswa.status = 1');
        $this->db->group_by('ta_dosen_pembimbing_1.id_dospem1 ');
        $this->db->order_by('id_mhs','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_dospem1_row(){
        $query = $this->db->get('ta_dosen_pembimbing_1');
        return $query->row();
    }

    public function list_dospem2(){
        $query = $this->db->get('ta_dosen_pembimbing_2');
        return $query->result();
    }

    public function beban2(){
        $this->db->select('ta_dosen_pembimbing_2.*,ta_mahasiswa.id_mhs,count(id_mhs) AS beban2');
        $this->db->from('ta_dosen_pembimbing_2');
        $this->db->join('ta_mahasiswa','ta_mahasiswa.id_dospem2 = ta_dosen_pembimbing_2.id_dospem2','LEFT');
        $this->db->where('ta_mahasiswa.id_dospem2 = ta_dosen_pembimbing_2.id_dospem2 AND ta_mahasiswa.status = 1');
        $this->db->group_by('id_dospem2');
        $this->db->order_by('id_dospem2','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_dospem2_row(){
        $query = $this->db->get('ta_dosen_pembimbing_2');
        return $query->row();
    }

    public function detail1($id_dospem1){
        $query = $this->db->get_where('ta_dosen_pembimbing_1',array('id_dospem1' => $id_dospem1));
        return $query->row();
    }

    public function detail2($id_dospem2){
        $query = $this->db->get_where('ta_dosen_pembimbing_2',array('id_dospem2' => $id_dospem2));
        return $query->row();
    }

    public function detail_wali($id_dosen_wali){
        $query = $this->db->get_where('ta_dosen_wali',array('id_dosen_wali' => $id_dosen_wali));
        return $query->row();
    }

    public function read1($id_dospem1){
        $query = $this->db->get_where('ta_dosen_pembimbing_1',array('id_dospem1' => $id_dospem1));
        return $query->row();
    }

    public function read2($id_dospem2){
        $query = $this->db->get_where('ta_dosen_pembimbing_2',array('id_dospem2' => $id_dospem2));
        return $query->row();
    }

    public function tambah1($data){
        $this->db->insert('ta_dosen_pembimbing_1',$data);
    }

    public function tambah2($data){
        $this->db->insert('ta_dosen_pembimbing_2',$data);
    }

    public function tambah_wali($data){
        $this->db->insert('ta_dosen_wali',$data);
    }

    public function edit1($data){
        $this->db->where('id_dospem1',$data['id_dospem1']);
        $this->db->update('ta_dosen_pembimbing_1',$data);
    }

    public function edit2($data){
        $this->db->where('id_dospem2',$data['id_dospem2']);
        $this->db->update('ta_dosen_pembimbing_2',$data);
    }

    public function edit_wali($data){
        $this->db->where('id_dosen_wali',$data['id_dosen_wali']);
        $this->db->update('ta_dosen_wali',$data);
    }

    public function hapus1($data){
        $this->db->where('id_dospem1',$data['id_dospem1']);
        $this->db->delete('ta_dosen_pembimbing_1',$data);
    }

    public function hapus2($data){
        $this->db->where('id_dospem2',$data['id_dospem2']);
        $this->db->delete('ta_dosen_pembimbing_2',$data);
    }

    public function hapus_wali($data){
        $this->db->where('id_dosen_wali',$data['id_dosen_wali']);
        $this->db->delete('ta_dosen_wali',$data);
    }
}