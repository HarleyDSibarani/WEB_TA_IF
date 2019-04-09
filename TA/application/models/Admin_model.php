<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $this->db->select('admin.*,tingkatan.nama_tingkatan');
        $this->db->from('admin');
	    $this->db->join('tingkatan','tingkatan.id_tingkatan = admin.id_tingkatan','LEFT');
        $this->db->order_by('id_admin','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_admin){
        $query = $this->db->get_where('admin',array('id_admin' => $id_admin));
        return $query->row();
    }

    public function login($username, $password){
        $query = $this->db->get_where('admin',array('username'     => $username,
                                                    'password'     => sha1($password))
                                                );
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('admin',$data);
    }

    public function edit($data){
        $this->db->where('id_admin',$data['id_admin']);
        $this->db->update('admin',$data);
    }

    public function hapus($data){
        $this->db->where('id_admin',$data['id_admin']);
        $this->db->delete('admin',$data);
    }
}