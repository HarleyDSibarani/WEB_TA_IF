<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang_model extends CI_Model {    

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function detail($id_sidang){
        $query = $this->db->get_where('ta_sidang',array('id_sidang' => $id_sidang));
        return $query->row();
    }

    public function listing(){
        $query = $this->db->get('ta_sidang');
        return $query->result();    
    }

    public function list_daftar_sidang(){
        $this->db->select('*');
        $this->db->from('ta_sidang');
        $this->db->where('ta_sidang.status = 0');
        $this->db->order_by('id_sidang','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function daftar_sidang(){
        $this->db->select('count(status = 0) AS sidang');
        $this->db->from('ta_sidang');
        $this->db->where('ta_sidang.status = 0');
        $this->db->order_by('id_sidang','DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('ta_sidang',$data);
    }

    public function edit($data){
        $this->db->where('id_sidang',$data['id_sidang']);
        $this->db->update('ta_sidang',$data);
    }

    public function peserta(){
        $this->db->select(' ta_mahasiswa.*,
                            ta_seminar_proposal.tgl_seminar_proposal,ta_seminar_hasil.tgl_seminar_hasil,ta_sidang.tgl_sidang,
                            ta_seminar_proposal.waktu AS wkt_pro,
                            ta_seminar_hasil.waktu AS wkt_has,
                            ta_sidang.waktu AS wkt_sid,
                            ta_seminar_proposal.ruangan AS ruang_pro,
                            ta_seminar_hasil.ruangan AS ruang_has,
                            ta_dosen_wali.nama_dosen_wali,ta_tingkatan.id_tingkatan,
                            ta_dosen_pembimbing_1.nama_dospem AS nama_dospem1,
                            ta_dosen_pembimbing_2.nama_dospem AS nama_dospem2');
        $this->db->from('ta_mahasiswa');
        $this->db->join('ta_dosen_wali','ta_dosen_wali.id_dosen_wali = ta_mahasiswa.id_dosen_wali','LEFT');
        $this->db->join('ta_tingkatan','ta_tingkatan.id_tingkatan = ta_mahasiswa.id_tingkatan','LEFT');
        $this->db->join('ta_dosen_pembimbing_1','ta_dosen_pembimbing_1.id_dospem1 = ta_mahasiswa.id_dospem1','LEFT');
        $this->db->join('ta_dosen_pembimbing_2','ta_dosen_pembimbing_2.id_dospem2 = ta_mahasiswa.id_dospem2','LEFT');
        $this->db->join('ta_seminar_proposal', 'ta_mahasiswa.nama_mhs = ta_seminar_proposal.nama_mhs', 'left');
        $this->db->join('ta_seminar_hasil', 'ta_mahasiswa.nama_mhs = ta_seminar_hasil.nama_mhs', 'left');
        $this->db->join('ta_sidang', 'ta_mahasiswa.nama_mhs = ta_sidang.nama_mhs', 'left');
        $this->db->where(   'ta_sidang.status = 1 OR ta_seminar_proposal.status = 1 OR ta_seminar_hasil.status = 1 OR ta_mahasiswa.status = 1 ');
        $this->db->order_by('ta_seminar_proposal.tgl_seminar_proposal,ta_seminar_hasil.tgl_seminar_hasil,ta_sidang.tgl_sidang','DESC');
        $query = $this->db->get();
        return $query->result();
    }

}