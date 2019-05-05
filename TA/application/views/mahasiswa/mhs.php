<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/admin/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Mahasiswa </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>assets/admin/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>assets/admin/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/admin/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo base_url() ?>assets/admin/img/sidebar-6.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    <img src="images/hafiz.png" class="img-circle" alt="">
                    <br>
                    <?php 
                        echo "Nama Mahasiswa";
                    ?>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="Mhs.php">
                        <i class="pe-7s-user"></i>
                        <p>Data Diri</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('riwayat_mhs') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Daftar Riwayat Bimbingan</p>
                    </a>
                </li>
               <li>
                   <a href="">
                   <i class="pe-7s-note2"></i>
                       <p>File skripsi</p>
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        
                       
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>

                        <li>
                            <a href="home.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

               

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="home.php">
                                Home
                            </a>
                        </li>
                       
                    </ul>
                </nav>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url() ?>assets/admin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url() ?>assets/admin/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url() ?>assets/admin/js/demo.js"></script>


</html>