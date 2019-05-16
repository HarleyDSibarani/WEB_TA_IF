<?php

$id_admin    = $this->session->userdata('id_admin');
$admin_aktif = $this->admin_model->detail($id_admin);

$id_dospem1    = $this->session->userdata('id_dospem1');
$dospem1_aktif = $this->dosen_model->detail1($id_dospem1);

$id_dospem2    = $this->session->userdata('id_dospem2');
$dospem2_aktif = $this->dosen_model->detail2($id_dospem2);

$mhs = $this->mhs_model->daftar();
$sidang = $this->sidang_model->daftar_sidang();
$proposal = $this->seminar_model->daftar_seminar_proposal();
$hasil = $this->seminar_model->daftar_seminar_hasil();

?>


<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo base_url() ?>assets/admin/img/sidebar-6.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text text-left">
                    <?php if ($this->session->userdata('tingkat_admin') == 1) {
                            echo $admin_aktif->nama; 
                        }elseif ($this->session->userdata('tingkat_admin') == 3 && $this->session->userdata('id_dospem1')) {
                            echo $dospem1_aktif->nama_dospem; 
                        }elseif ($this->session->userdata('tingkat_admin') == 3 && $this->session->userdata('id_dospem2')) {
                            echo $dospem2_aktif->nama_dospem; 
                        }
                     ?>
                </a>
            </div>

            <ul class="nav">
            <?php if ($this->session->userdata('tingkat_admin') == 1) { ?>
                <li>
                    <a href="<?php echo base_url('admin/admin') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Administrator</p>
                        
                    </a>
                </li>
           <?php }else{?>
            <li  class="hidden">
                    <a href="<?php echo base_url('admin/admin') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Administrator</p>
                        
                    </a>
                </li>
           <?php }?>

           <?php if ($this->session->userdata('tingkat_admin') == 3) { ?>
                <li class="hidden">
                    <a href="<?php echo base_url('admin/dosen_pembimbing_1') ?>">
                        <i class="pe-7s-user"></i>
                        <p>Dosen Pemimbing 1</p>
                    </a>
                </li>
                <li class="hidden">
                    <a href="<?php echo base_url('admin/dosen_pembimbing_2') ?>">
                        <i class="pe-7s-user"></i>
                        <p>Dosen Pemimbing 2</p>
                    </a>
                </li>
                <li class="hidden">
                    <a href="<?php echo base_url('admin/dosen_wali') ?>">
                        <i class="pe-7s-user"></i>
                        <p>Dosen Wali</p>
                    </a>
                </li>
                <li class="hidden">
                    <a href="<?php echo base_url('admin/mahasiswa') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Mahasiswa Tugas Akhir</p>
                    </a>
                </li>  
            <?php }else{?>
                <li>
                    <a href="<?php echo base_url('admin/dosen_pembimbing_1') ?>">
                        <i class="pe-7s-user"></i>
                        <p>Dosen Pemimbing 1</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/dosen_pembimbing_2') ?>">
                        <i class="pe-7s-user"></i>
                        <p>Dosen Pemimbing 2</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/dosen_wali') ?>">
                        <i class="pe-7s-user"></i>
                        <p>Dosen Wali</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/mahasiswa') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Mahasiswa Tugas Akhir</p>
                    </a>
                </li>  
            <?php }?>

            <?php if ($this->session->userdata('tingkat_admin') == 3 || $this->session->userdata('tingkat_admin') == 1){?>
                <li>
                    <a href="<?php echo base_url('admin/bimbingan') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Bimbingan</p>
                    </a>
                </li>
            <?php }else{?>
                <li class="hidden">
                    <a href="<?php echo base_url('admin/bimbingan') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Bimbingan</p>
                    </a>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('tingkat_admin') == 1 || $this->session->userdata('tingkat_admin') == 3) { ?>
                <li>
                    <a href="<?php echo base_url('admin/jadwal') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Jadwal Seminar/Sidang</p>
                    </a>
                </li>
            <?php }else{ ?>
                <li class="hidden">
                    <a href="<?php echo base_url('admin/jadwal') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Jadwal Seminar/Sidang</p>
                    </a>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('tingkat_admin') == 1 || $this->session->userdata('tingkat_admin') == 2) { ?>
                <li>
                    <a href="<?php echo base_url('admin/syarat') ?>">
                        <i class="pe-7s-bookmarks"></i>
                        <p>Persyaratan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/syarat/upload_dok') ?>">
                        <i class="pe-7s-copy-file"></i>
                        <p>Upload Dokumen</p>
                    </a>
                </li>
            <?php }else{?>
                <li  class="hidden">
                    <a href="<?php echo base_url('admin/admin') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Persyaratan</p>
                    </a>
                </li>
                <li  class="hidden">
                    <a href="<?php echo base_url('admin/admin') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Upload Dokumen</p>
                    </a>
                </li>
            <?php }?>

                <li>
                    <a href="<?php echo base_url('admin/notifikasi') ?>">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Halaman Administrator WEB TA IF</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                        <?php $total = $mhs->pending + $sidang->sidang + $proposal->proposal + $hasil->hasil ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <span class="notification hidden-sm hidden-sm"><?php echo $total ?></span>
                            </a>
                            <ul class="dropdown-menu text text-left">
                                <li><a class="btn btn-sm square-btn-adjust" href="<?php echo base_url('admin/notifikasi') ?>">Daftar : <?php echo $mhs->pending ?></a></li>
                                <li><a class="btn btn-sm square-btn-adjust" href="<?php echo base_url('admin/notifikasi') ?>">Sidang : <?php echo $sidang->sidang ?></a></li>
                                <li><a class="btn btn-sm square-btn-adjust" href="<?php echo base_url('admin/notifikasi') ?>">Seminar Prooposal : <?php echo $proposal->proposal ?></a></li>
                                <li><a class="btn btn-sm square-btn-adjust" href="<?php echo base_url('admin/notifikasi') ?>">Seminar Hasil : <?php echo $hasil->hasil ?></a></li>
                            </ul>
                            </ul>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right text-left">
                        <li>
                            <a class="btn btn-primary square-btn-adjust">
                                <?php 
                                date_default_timezone_set("Asia/Jakarta");
                                echo date('d M Y');
                                ?>
                            </a>
                        </li>

                        <li class="text-left">
                           <a class="btn btn-success square-btn-adjust">
                               <?php if ($this->session->userdata('tingkat_admin') == 1) {
                                        echo "Koordinator TA"; 
                                    }elseif ($this->session->userdata('tingkat_admin') == 2) {
                                        echo "Sekretaris Prodi"; 
                                    }elseif ($this->session->userdata('tingkat_admin') == 3) {
                                        echo "Dosen Pembimbing"; 
                                    }
                                ?>                                
                            </a>
                        </li>   

                        <li>
                            <a href="<?php echo base_url('login_admin/logout_admin')?>" class="btn btn-danger text-left square-btn-adjust">Log out</a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>