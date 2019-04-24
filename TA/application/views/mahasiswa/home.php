<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="http://localhost/TA/assets/admin/img/favicon.ico">  
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/css/business-frontpage.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/calendar/js/jsCalendar.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/calendar/css/jsCalendar.darkseries.css">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#007bff">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('mahasiswa/welcome') ?>">Website Informasi Tugas Akhir</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('mahasiswa/welcome') ?>">Home<span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mahasiswa/syarat') ?>">Persyaratan</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mahasiswa/profil') ?>">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login/logout') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="py-5 mb-1" style="background-image:url(<?php echo base_url() ?>assets/home/images/iterabackground2.jpg);background-attachment:fixed;background-size: 100% 100%;">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mx-auto  ">Website Informasi Tugas Akhir</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container-fluid" style="padding:100px;">
    <div class="row">
      <div class="col-md-8 mb-5">
        <div class="container border border-dark">
          <br><h2 class="text-primary">Dosen Pembimbing 1</h2>
            <div class="row">
            <?php  $i=1; foreach($dosen_pembimbing_1 as $dospem1) { ?>
              <div class="col-lg-4">
                <div class="card border-primary mx-auto" style="height:95%;">
                  <img class="card-img" width="60%" src="<?php echo base_url('./assets/upload/dosen/image/thumbs/'.$dospem1->foto) ?>" alt="Card image cap">
                  <a class="card-header text-primary text-center" href="<?php echo base_url('mahasiswa/bimbingan_mhs/read1/'.$dospem1->id_dospem1) ?>" ><?php echo $dospem1->nama_dospem ?></a>
                  <div class="card-body text-primary ">
                    <h3 class="card-title text-underline"><u>Keterangan : </u></h3>
                    <h6 class="card-text fa-md text-center text-primary"><?php echo $dospem1->nip ?></h6>
                    <h6 class="card-text fa-md text-center text-primary"><?php echo $dospem1->email ?></h6>
                    <p class="card-text font-weight-bold text-center text-primary">Jumlah Beban Bimbingan : <?php echo $dospem1->beban ?></p>
                    <p class="card-text fa-md text-center text-primary"><?php echo $dospem1->keterangan ?></p>																
                  </div>
                </div>	
              </div>
            <?php $i++; } ?> 
            </div>
          </div>
          <br>
          <div class="container border border-primary">
          <br><h2 class="text-info">Dosen Pembimbing 2</h2>
            <div class="row">
            <?php  $i=1; foreach($dosen_pembimbing_2 as $dospem2) { ?>
              <div class="col-lg-4">
                <div class="card border-success mx-auto" style="height:95%;">
                  <img class="card-img" width="60%" src="<?php echo base_url('./assets/upload/dosen/image/thumbs/'.$dospem2->foto) ?>" alt="Card image cap">
                  <a class="card-header text-primary text-center" href="<?php echo base_url('mahasiswa/bimbingan_mhs/read2/'.$dospem2->id_dospem2) ?>" ><?php echo $dospem2->nama_dospem ?></a>
                  <div class="card-body text-primary">
                    <h3 class="card-title text-underline"><u>Keterangan : </u></h3>
                    <h6 class="card-text fa-md text-center text-primary"><?php echo $dospem2->nip ?></h6>
                    <h6 class="card-text fa-md text-center text-primary"><?php echo $dospem2->email ?></h6>
                    <p class="card-text font-weight-bold text-center text-primary">Jumlah Beban Bimbingan : <?php echo $dospem2->beban ?></p>
                    <p class="card-text fa-md text-center text-primary"><?php echo $dospem2->keterangan ?></p>																
                  </div>
                </div>
              </div>
            <?php $i++; } ?> 
            </div>
          </div>
      </div>
      <div class="col-md-4 mb-auto  border border-secondary">
				<br>
				<aside class="sidebar">
					<div class="card border-primary mb-4">
            <div class="card-body">
              <div id="clock" class="btn-lg btn-primary text-center"></div>
              <script type="text/javascript">

                function showTime(){
                  var date = new Date();
                  var h = date.getHours();
                  var m = date.getMinutes();
                  var s = date.getSeconds();
                  var session = "A.M";
                    if(h==0){
                      h=12;
                    }
                    if(h>12){
                      h= h-12;
                      session= "P.M";
                    }
                  h = (h<10) ? "0" + h : h;
                  m = (m<10) ? "0" + m : m;
                  s = (s<10) ? "0" + s : s;
                  var time = h + ":" + m + ":" + s + " " + session;
                  document.getElementById("clock").innerText = time;
                  document.getElementById("clock").textContent = time;

                  setTimeout(showTime, 1000);
                }
                  showTime();
                </script>
            </div>
					</div>
				</aside>

        <div class="card border-primary mb-4 text-center">
          <div class="card-body ">
            <h3 class="card-title text-center">Pendaftaran</h3>
            <?php include('daftar_ta.php'); ?><br>
            <?php include('sidang.php'); ?><br>
            <?php include('seminar.php'); ?>
          </div>
        </div><!-- /.card -->
        <div class="card border-primary mb-4">
          <div class="card-body auto-jsCalendar" style="left:12%;"></div>
              
        </div>
      </div>
    </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <!-- Footer -->
  <footer class="py-5 " style="background-color:#007bff">
    <div class="container">
      <p class=" m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  
  <script src="<?php echo base_url() ?>assets/calendar/js/jsCalendar.js"></script>
  <script src="<?php echo base_url() ?>assets/calendar/js/jsCalendar.lang.de.js"></script>
  <script src="<?php echo base_url() ?>assets/home/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
