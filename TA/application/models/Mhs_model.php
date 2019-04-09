<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $this->db->select('mahasiswa.*,dosen.nama_dosen');
        $this->db->from('mahasiswa');
	    $this->db->join('dosen','dosen.id_dosen = mahasiswa.id_dosen','LEFT');
        $this->db->order_by('id_mhs','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_mhs){
        $query = $this->db->get_where('mahasiswa',array('id_mhs' => $id_mhs));
        return $query->row();
    }

    public function login($username, $password){
        $query = $this->db->get_where('mahasiswa',array('username' => $username,
                                                    'password' => sha1($password))
                                                );
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('mahasiswa',$data);
    }

    public function edit($data){
        $this->db->where('id_mhs',$data['id_mhs']);
        $this->db->update('mahasiswa',$data);
    }

    public function hapus($data){
        $this->db->where('id_mhs',$data['id_mhs']);
        $this->db->delete('mahasiswa',$data);
    }
}