<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $this->db->select('daftar.*,mahasiswa.*,
                           dosen_wali.nama_dosen_wali,
                           dosen_pembimbing_1.nama_dospem,dosen_pembimbing_2.nama_dospem');
        $this->db->from('daftar');
        $this->db->join('mahasiswa','mahasiswa.id_mhs = daftar.id_mhs','LEFT');
        $this->db->join('dosen_wali','dosen_wali.id_dosen_wali = daftar.id_dosen_wali','LEFT');
        $this->db->join('dosen_pembimbing_1','dosen_pembimbing_1.id_dospem1 = daftar.id_dospem1','LEFT');
        $this->db->join('dosen_pembimbing_2','dosen_pembimbing_2.id_dospem2 = daftar.id_dospem2','LEFT');
        $this->db->order_by('id_daftar','DESC');
        $query = $this->db->get();
        return $query->result();
    }
}