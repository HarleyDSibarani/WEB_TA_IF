  
<!DOCTYPE html>
<html lang="en">

<head>
<?php

$id_mhs    = $this->session->userdata('id_mhs');
$mhs_aktif = $this->mhs_model->detail($id_mhs);

$proposal = $this->seminar_model->list_proposal();
$hasil = $this->seminar_model->list_hasil();
$sidang = $this->sidang_model->listing();

?>

  <title><?php echo $mhs_aktif->nama_mhs ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.1.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/css/font-awesome.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>assets/admin/css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" >
      <img class="d-block d-lg-none img-thumbnail rounded-circle" width="60" src="<?php echo base_url('./assets/upload/mhs/image/'.$mhs_aktif->foto) ?>">
      <span class="d-none d-lg-block">
        <img class="img-thumbnail img-profile rounded-circle mx-auto mb-4" src="<?php echo base_url('./assets/upload/mhs/image/'.$mhs_aktif->foto) ?>">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#profil"><?php echo $mhs_aktif->nama_mhs ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#riwayat">Riwayat Bimbingan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#edit">Edit Data Diri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="<?php echo base_url('mahasiswa/welcome') ?>">Back to Home</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex" id="profil">
    <div class="w-100"><br>
    <img class="img-thumbnail img-profile rounded-circle mx-auto mb-2" width="25%" src="<?php echo base_url('./assets/upload/mhs/image/'.$mhs_aktif->foto) ?>">
    <br><br><br>  
        <h2 class="mb-0">
          <span class="text-primary"><?php echo $mhs_aktif->nama_mhs ?> ( <?php echo $mhs_aktif->nim?> )</span>
        </h2>
        <div class="subheading mb-5">
        <br>
          <h3 class="text-muted">
            <?php echo $mhs_aktif->email ?><br>
            Angkatan : <?php echo $mhs_aktif->angkatan ?>
          </h3>
        </div>
        <div class="subheading mb-5">
         <h4>
          Dosen Wali Akademik :   
          <?php 
            foreach ($wali as $wali) {
              if ($mhs_aktif->id_dosen_wali == $wali->id_dosen_wali) {
                echo $wali->nama_dosen_wali;
              }
            }?>
          <br>
          Dosen Pembimbing 1 : 
          <?php 
            foreach ($dosen_pembimbing_1 as $dosen1) {
              if ($mhs_aktif->id_dospem1 == $dosen1->id_dospem1) {
                echo $dosen1->nama_dospem;
              }
            }?>
          <br>
          Dosen Pembimbing 2 : 
          <?php 
            foreach ($dosen_pembimbing_2 as $dosen2) {
              if ($mhs_aktif->id_dospem2 == $dosen2->id_dospem2) {
                echo $dosen2->nama_dospem;
              }
            }?>
          </h4>
        </div>
          <p class="mb-5 "><h3 class="text-info text-center"><?php echo $mhs_aktif->judul ?></h3></p>     
      </div>
        </div>
    </section>
  
    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="riwayat">
    <div class="w-100">
        <h3 class="text-muted"><?php echo $mhs_aktif->nama_mhs ?> ( <?php echo $mhs_aktif->nim ?> )</h3>
        <h4 class="text-muted">Judul Tugas Akhir : <?php echo $mhs_aktif->judul ?></h4>
        <h5 class="text-info">Tanggal Daftar : <?php echo date("d-m-Y",strtotime($mhs_aktif->tgl_daftar)) ?></h5>
        <h5 class="text-primary">
            Status Seminar Proposal : <?php if (count($proposal) == 0) {
                                              echo '<span class="text-warning">Data Daftar Seminar Kosong</span>';
                                            }else{
                                              foreach ($proposal as $proposal) {
                                                if ($mhs_aktif->nama_mhs == $proposal->nama_mhs) {
                                                  if($proposal->status == 0){
                                                    echo '<span class="text-danger">Belum Divalidasi</span>';
                                                  }else{
                                                    echo '<span class="text-success">Sudah Divalidasi </span>'.'| Tanggal : '.date("D , d-F-Y",strtotime($proposal->tgl_seminar_proposal)).' | Jam : '.date('H:i',strtotime($proposal->waktu)).' | Tempat : '.$proposal->ruangan;
                                                  }
                                                }
                                              }
                                            }
                                          ?> <br>
            Status Seminar Hasil : <?php if (count($hasil) == 0) {
                                              echo '<span class="text-warning">Data Daftar Seminar Kosong</span>';
                                            }else{
                                               foreach ($hasil as $hasil) {
                                                if ($mhs_aktif->nama_mhs == $hasil->nama_mhs) {
                                                  if($hasil->status == 0){
                                                    echo '<span class="text-danger">Belum Divalidasi</span>';
                                                  }else{
                                                    echo '<span class="text-success">Sudah Divalidasi</span>'.'| Tanggal : '.date("D , d-F-Y",strtotime($hasil->tgl_seminar_hasil)).' | Jam : '.date('H:i',strtotime($hasil->waktu)).' | Tempat : '.$hasil->ruangan;
                                                  }
                                                }  
                                              }                                            
                                            }
                                          ?> <br>
            Status Sidang : <?php if (count($sidang) == 0) {
                                    echo '<span class="text-warning">Data Daftar Sidang Kosong</span>';
                                  }else{
                                    foreach ($sidang as $sidang) {
                                      if ($mhs_aktif->nama_mhs == $sidang->nama_mhs) {
                                        if($sidang->status == 0){
                                          echo '<span class="text-danger">Belum Divalidasi</span>';
                                        }else{
                                          echo '<span class="text-success">Sudah Divalidasi</span>'.'| Tanggal : '.date("D , d-F-Y",strtotime($sidang->tgl_sidang)).' | Jam : '.date('H:i',strtotime($sidang->waktu));
                                        }
                                      }
                                    }
                                  }
                                ?> 
        </h5>
        
        <br><br>
        <h3 class="title text-primary text-center">Riwayat Bimbingan</h3>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>#</th>
                        <th>Pesan</th>
                        <th>Dari</th>
                        <th>AS</th>
                        <th>Tanggal Dikirim</th>
                    </thead>
                    <tbody>
                      <?php  $i=1; foreach($bimbingan as $bimbingan) { ?>
                        <?php if($mhs_aktif->nama_mhs == $bimbingan->nama_mhs){ ?>
                        <tr class="odd gradex">
                          <td><?php echo $i ?></td>
                          <td><?php echo $bimbingan->pesan ?></td>
                          <td><?php echo $bimbingan->nama_dosen ?></td>
                          <td><?php echo $bimbingan->sebagai ?></td>
                          <td><?php echo date("d-m-Y",strtotime($bimbingan->tgl_kirim)) ?></td>
                        </tr>
                      <?php } $i++; } ?> 
                    </tbody>
                </table>
            </div>
        </div>
        </section>

        <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="edit">
      <div class="w-100">
        <?php
          echo validation_errors('<div class="alert alert-warning">','</div>');
          echo form_open_multipart(base_url('mahasiswa/profil/upload_skripsi/'.$mhs_aktif->id_mhs)); 
        ?>
          <div class="header">
              <h4 class="title"><?php echo $title?></h4>
          </div>

            <div class="col-md-6">
              <div class="form-group form-group-md">
                <label>Skripsi Tugas Akhir</label>
                <input type="file" name="dokumen" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">              
              <div class="form">
                <input type="submit" name="submit" class="btn btn-primary btn-md" value="Save">
                <input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
              </div>
            </div>

        <?php echo form_close(); ?>

          <br>
          <div class="col-md-8"> 
            <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                <thead>
                  <th>Preview</th>
                  <th>Judul Dokumen</th>
                </thead>
                <tbody>
                  <td><?php include('detail.php') ?></td>
                  <td><?php echo $mhs_aktif->dokumen ?></td>
                </tbody>
              </table>
            </div>
          </div>

        <br><br>
 
        <?php
          echo validation_errors('<div class="alert alert-warning">','</div>');
          echo form_open_multipart(base_url('mahasiswa/profil/edit_profil/'.$mhs_aktif->id_mhs));
          if ($this->session->flashdata('SUKSES')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('SUKSES');
                echo '</div>';
            }
        ?>
          <div class="header">
              <h4 class="title">Ganti Password</h4>
          </div>

          <div class="col-md-12">
            <div class="form-group form-group-md">
              <label>Password <span class="text-danger"><small>(Password Minimal 8 karakter atau Biarkan Kosong)</small></span></label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password" >
            </div>
          </div>

          <div class="col-md-6">
              <div class="form-group form-group-md">
                <label>Foto Profil</label>
                <div class="col-md-3">
                  <img src="<?php echo base_url('./assets/upload/mhs/image/thumbs/'.$mhs_aktif->foto) ?>" class="img-thumbnail rounded-circle mx-auto mb-4">
                </div>
                <input type="file" name="foto" class="form-control" >
              </div>
          </div>

          

          <div class="col-md-6">
            <div class="form">
              <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
              <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
            </div>
          </div>

          <?php echo form_close(); ?>

      </div>
    </section>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url() ?>assets/admin/js/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url() ?>assets/admin/js/resume.min.js"></script>

</body>

</html>
