
<!DOCTYPE html>
<html lang="en">

<head>

  <title><?php echo $dosen->nama_dospem ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.1.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet"/>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>assets/admin/css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" >
      <img class="d-block d-lg-none img-thumbnail rounded-circle" width="60" src="<?php echo base_url('./assets/upload/dosen/image/thumbs/'.$dosen->foto) ?>">
      <span class="d-none d-lg-block">
        <img class="img-thumbnail img-profile rounded-circle mx-auto mb-2" src="<?php echo base_url('./assets/upload/dosen/image/thumbs/'.$dosen->foto) ?>">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger"><?php echo $dosen->nama_dospem ?></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-auto d-flex" id="about">
        <div class="w-100">
        <h3 class="text-muted"><?php echo $dosen->nama_dospem ?> ( <?php echo $dosen->nip ?> )</h3>
        <h4 class="text-muted"><?php echo $dosen->email ?></h4><br>
        <h4 class="text-primary"><?php echo $dosen->keterangan?></h4>
        <br><br>
        <h3 class="title text-primary text-center">Beban Bimbingan</h3>
            <div class=" content table-responsive-xl ">
                <table class="table table-hover table-striped"style="padding-right:50px" >
                    <thead>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>Judul Tugas Akhir</th>
                        <th>Angkatan</th>
                        <th>Dosen Wali</th>
                        <th>Dosen Pembimbing 1</th>
                        <th>Dosen Pembimbing 2</th>
                        <th>Tanggal Daftar</th>
                        <th>Tanggal Seminar</th>
                        <th>Tanggal Sidang</th>
                    </thead>
                    <tbody> 
                      <?php  $i=1; foreach($daftar as $bimbingan) { ?>
                        <tr class="odd gradex">
                            <td><?php echo $i?></td>
                            <td><?php echo $bimbingan->nama_mhs?></td>
                            <td><?php echo $bimbingan->nim?></td>
                            <td><?php echo $bimbingan->judul?></td>
                            <td><?php echo $bimbingan->angkatan?></td>
                            <td><?php echo $bimbingan->nama_dosen_wali?></td>
                            <td><?php echo $bimbingan->nama_dospem?></td>
                            <td><?php echo $bimbingan->nama_dospem?></td>
                            <td><?php echo $bimbingan->tgl_daftar?></td>
                            <td><?php echo $bimbingan->tgl_seminar?></td>
                            <td><?php echo $bimbingan->tgl_sidang?></td>
                        </tr>
                      <?php $i++; } ?> 
                    </tbody>
                </table>
            </div>
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
