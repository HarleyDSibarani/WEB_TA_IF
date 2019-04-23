    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mhs extends CI_Controller {
	public function index(){
		$this->load->view('home/mhs');
	}
}