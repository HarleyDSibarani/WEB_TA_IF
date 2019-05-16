<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $this->db->select('ta_admin.*,ta_tingkatan.nama_tingkatan');
        $this->db->from('ta_admin');
	    $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_admin.id_tingkatan','LEFT');
        $this->db->order_by('id_admin','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_admin){
        $query = $this->db->get_where('ta_admin',array('id_admin' => $id_admin));
        return $query->row();
    }

    public function login($username, $password){
        $query = $this->db->get_where('ta_admin',array( 'username'     => $username,
                                                        'password'     => sha1($password))
                                                );
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('ta_admin',$data);
    }

    public function edit($data){
        $this->db->where('id_admin',$data['id_admin']);
        $this->db->update('ta_admin',$data);
    }

    public function hapus($data){
        $this->db->where('id_admin',$data['id_admin']);
        $this->db->delete('ta_admin',$data);
    }
}