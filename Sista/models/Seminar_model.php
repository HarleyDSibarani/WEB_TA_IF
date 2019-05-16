<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar_model extends CI_Model {    

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function detail_proposal($id_seminar_proposal){
        $query = $this->db->get_where('ta_seminar_proposal',array('id_seminar_proposal' => $id_seminar_proposal));
        return $query->row();
    }

    public function detail_hasil($id_seminar_hasil){
        $query = $this->db->get_where('ta_seminar_hasil',array('id_seminar_hasil' => $id_seminar_hasil));
        return $query->row();
    }

    public function daftar_seminar_proposal(){
        $this->db->select('count(status = 0) AS proposal');
        $this->db->from('ta_seminar_proposal');
        $this->db->where('ta_seminar_proposal.status = 0');
        $this->db->order_by('id_seminar_proposal','DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function daftar_seminar_hasil(){
        $this->db->select('count(status = 0) AS hasil');
        $this->db->from('ta_seminar_hasil');
        $this->db->where('ta_seminar_hasil.status = 0');
        $this->db->order_by('id_seminar_hasil','DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function list_proposal(){
        $query = $this->db->get('ta_seminar_proposal');
        return $query->result();    
    }

    public function list_hasil(){
        $query = $this->db->get('ta_seminar_hasil');
        return $query->result();    
    }

    public function list_daftar_seminar_proposal(){
        $this->db->select('*');
        $this->db->from('ta_seminar_proposal');
        $this->db->where('ta_seminar_proposal.status = 0');
        $this->db->order_by('id_seminar_proposal','DESC');
        $query = $this->db->get();
        return $query->result();
    }

public function list_daftar_seminar_hasil(){
        $this->db->select('*');
        $this->db->from('ta_seminar_hasil');
        $this->db->where('ta_seminar_hasil.status = 0');
        $this->db->order_by('id_seminar_hasil','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_jadwal_seminar_proposal(){
        $this->db->select('*');
        $this->db->from('ta_seminar_proposal');
        $this->db->where('ta_seminar_proposal.status = 1');
        $this->db->order_by('id_seminar_proposal','DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function list_jadwal_seminar_hasil(){
        $this->db->select('*');
        $this->db->from('ta_seminar_hasil');
        $this->db->where('ta_seminar_hasil.status = 1');
        $this->db->order_by('id_seminar_hasil','DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_proposal($data){
        $this->db->insert('ta_seminar_proposal',$data);
    }

    public function tambah_hasil($data){
        $this->db->insert('ta_seminar_hasil',$data);
    }

    public function edit_proposal($data){
        $this->db->where('id_seminar_proposal',$data['id_seminar_proposal']);
        $this->db->update('ta_seminar_proposal',$data);
    }

    public function edit_hasil($data){
        $this->db->where('id_seminar_hasil',$data['id_seminar_hasil']);
        $this->db->update('ta_seminar_hasil',$data);
    }

}