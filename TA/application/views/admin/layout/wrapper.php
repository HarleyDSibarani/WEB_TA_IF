<?php

if ($this->session->userdata('username') == "" && $this->session->userdata('tinggkatan') == "") {
    $this->session->set_flashdata('sukses','Silahkan Login Dahulu');
    redirect(base_url('login'),'refresh');
}

require_once('head.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');

?>
