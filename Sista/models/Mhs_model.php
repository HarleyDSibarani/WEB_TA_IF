<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $this->db->select('ta_mahasiswa.*,ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->where('ta_mahasiswa.status = 1');
        $this->db->order_by('id_mhs','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_daftar(){
        $this->db->select('ta_mahasiswa.*,ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->where('ta_mahasiswa.status = 0');
        $this->db->order_by('id_mhs','DESC');
        $query = $this->db->get();
        return $query->result();
    }

        public function daftar(){
        $this->db->select('ta_mahasiswa.*,ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2,
                            count(ta_mahasiswa.status = 0) AS pending');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->where('ta_mahasiswa.status = 0');
        $this->db->order_by('id_mhs','DESC');
        $query = $this->db->get();
        return $query->row();

    }

    public function beban1(){
        $this->db->select('ta_mahasiswa.*,ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->where('ta_mahasiswa.id_dospem1 = ta_dosen_pembimbing_1.id_dospem1 ');
        $this->db->order_by('id_dospem1','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function beban2(){
        $this->db->select('ta_mahasiswa.*,ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->where('ta_mahasiswa.id_dospem2 = ta_dosen_pembimbing_2.id_dospem2 ');
        $this->db->order_by('id_dospem2','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function profil(){
        $this->db->select('ta_mahasiswa.*,ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->order_by('id_mhs','DESC');   
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_mhs){
        $query = $this->db->get_where('ta_mahasiswa',array('id_mhs' => $id_mhs));
        return $query->row();
    }

    public function login($username, $password){
        $query = $this->db->get_where('ta_mahasiswa',array('username' => $username,
                                                        'password' => sha1($password))
                                                );
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('ta_mahasiswa',$data);
    }

    public function edit($data){
        $this->db->where('id_mhs',$data['id_mhs']);
        $this->db->update('ta_mahasiswa',$data);
    }

    public function hapus($data){
        $this->db->where('id_mhs',$data['id_mhs']);
        $this->db->delete('ta_mahasiswa',$data);
    }
}