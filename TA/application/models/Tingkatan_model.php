<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkatan_model extends CI_Model {    

    public function __construct(){
            $this->load->database();
    }

    public function listing(){
        $query = $this->db->get('tingkatan');
        return $query->result();
    }
}