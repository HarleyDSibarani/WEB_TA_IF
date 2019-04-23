<?php

$id_admin    = $this->session->userdata('id_admin');
$admin_aktif = $this->admin_model->detail($id_admin);

?>


<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo base_url() ?>assets/admin/img/sidebar-6.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php
                    if(($admin_aktif->id_tingkatan) == 1 ){
                        echo base_url('admin/admin1/admin');
                    }elseif(($admin_aktif->id_tingkatan) == 2 ){
                        echo base_url('admin/admin2/admin');
                    }elseif (($admin_aktif->id_tingkatan) == 3 ) {
                        echo base_url('admin/admin3/admin');
                    }
                        ?>" class="simple-text">
                    <?php echo $admin_aktif->nama ?>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php 
                        if(($admin_aktif->id_tingkatan) == 1 ){
                            echo base_url('admin/admin1/admin');
                        }elseif(($admin_aktif->id_tingkatan) == 2 ){
                            echo base_url('admin/admin2/admin');
                        }elseif (($admin_aktif->id_tingkatan) == 3 ) {
                            echo base_url('admin/admin3/admin');
                        }
                    ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Data Admin</p>
                        
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        if(($admin_aktif->id_tingkatan) == 1 ){
                            echo base_url('admin/admin1/dosen_pembimbing');
                        }elseif(($admin_aktif->id_tingkatan) == 2 ){
                            echo base_url('admin/admin2/dosen_pembimbing');
                        }elseif (($admin_aktif->id_tingkatan) == 3 ) {
                            echo base_url('admin/admin3/dosen_pembimbing');
                        }
                    ?>">
                        <i class="pe-7s-user"></i>
                        <p>Data Dosen Pemimbing</p>
                    </a>
                </li>
                <li>
                    <a href="<?php 
                        if(($admin_aktif->id_tingkatan) == 1 ){
                            echo base_url('admin/admin1/mahasiswa');
                        }elseif(($admin_aktif->id_tingkatan) == 2 ){
                            echo base_url('admin/admin2/mahasiswa');
                        }elseif (($admin_aktif->id_tingkatan) == 3 ) {
                            echo base_url('admin/admin3/mahasiswa');
                        }
                    ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Data Mahasiswa</p>
                    </a>
                </li>
                <li>
                    <a href="schedule.html">
                        <i class="pe-7s-note2"></i>
                        <p>Jadwal Bimbingan</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
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
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <span class="notification hidden-sm hidden-sm">5</span>
                                        
                                    </span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="btn btn-primary square-btn-adjust">
                                <?php 
                                date_default_timezone_set("Asia/Jakarta");
                                echo date('d M Y');
                                ?>
                            </a>
                        </li>

                        <li>
                           <a class="btn btn-success square-btn-adjust">
                               <p><?php echo $admin_aktif->nama ?> ( <?php 
                                    if(($admin_aktif->id_tingkatan) == 1 ){
                                        echo "Kordinator TA";
                                    }elseif (($admin_aktif->id_tingkatan) == 2 ) {
                                        echo "Sekertaris Kordinator TA";
                                    }elseif (($admin_aktif->id_tingkatan) == 3 ) {
                                        echo "Dosen Pembimbing";
                                    }else{
                                        echo "Mahasiswa";
                                    } ?> )
                                </p>
                            </a>
                        </li>   

                        <li>
                            <a href="<?php echo base_url('login/logout')?>" class="btn btn-danger square-btn-adjust">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
