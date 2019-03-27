<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>form pendaftaran</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  </head>
  <body>
    <head>
    <div class="col-md-4 col-md-offset-4 form-login">
    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>
    <div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-6.jpg">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Admin
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>Data Dosen</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>Register</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
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

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>
</head>
<body>
    <h1>Registrasi Mahasiswa Tugas Akhir</h1>
    <h2>Program Studi Teknik Informatika</h2>
    <hr width="100%" align="center">
    <p>Isilah seluruh kolom registrasi dengan <br />sebenar-benarnya.</p>
    <table>
        <tr>
            <td valign="top">Nama Lengkap :</td>
            <td><input type="text" name="nama" placeholder="Masukan nama anda"></td>
        </tr>
        <tr>
            <td valign="top">NIM :</td>
            <td><input type="text" name="NIM" placeholder="Masukan NIM"></td>
        </tr>
        <tr>
            <td valign="top">Email :</td>
            <td><input type="email" name="email" placeholder="Masukan Email"></td>
        </tr>
        <tr>
            <td valign="top">Password :</td>
               <td><input type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td valign="top">Jenis Kelamin :</td>
            <td>
                <select>
                    <option>-</option>
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td valign="top">Tanggal Lahir :</td>
            <td>
               <input type="text" style="width: 25px" placeholder="dd">
               <input type="text" style="width: 25px" placeholder="mm">
               <input type="text" style="width: 50px" placeholder="yyyy">
            </td>
        </tr>
        <tr>
            <td valign="top">Negara :</td>
            <td><input type="text" name="negara" placeholder="Negara tempat tinggal"></td>
        </tr>
        <tr>
            <td valign="top">Kota :</td>
            <td>
                <select>
            <option>Ambon</option>
            <option>Balikpapan</option>
            <option>Bandung</option>
            <option>Banda Aceh</option>
            <option>Banjarmasin</option>
            <option>Batam</option>
            <option>Bengkulu</option>
            <option>Cirebon</option>
            <option>Denpasar</option>
            <option>Garut</option>
            <option>Gorontalo</option>
            <option>Gresik</option>
            <option>Jakarta</option>
            <option>Jambi</option>
            <option>Jayapura</option>
            <option>Karawang</option>
            <option>Kupang</option>
            <option>Lampung</option>
            <option>Makassar</option>
            <option>Malang</option>
            <option>Manado</option>
            <option>Mataram</option>
            <option>Medan</option>
            <option>Padang</option>
            <option>Palangkaraya</option>
            <option>Palembang</option>
            <option>Palu</option>
            <option>Pekalongan</option>
            <option>Pekanbaru</option>
            <option>Pontianak</option>
            <option>Rantau Prapat</option>
            <option>Samarinda</option>
            <option>Semarang</option>
            <option>Serang</option>
            <option>Sidoarjo</option>
            <option>Singkawang</option>
            <option>Solo</option>
            <option>Sumedang</option>
            <option>Surabaya</option>
            <option>Tanggerang</option>
            <option>Tanjung Pinang</option>
                </select>
            </td>
        </tr>
        <tr>
            <td valign="top">Judul Tugas Akhir  :</td>
            <td><textarea placeholder="isilah pilihan judul Tugas Akhir anda" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
            <td valign="top">Dosen Pembimbing 1 :</td>
            <td><input type="text" name="nama" placeholder="Dosen Pembimbing 1"></td>
        </tr>
        <tr>
            <td valign="top">Dosen Pembimbing 2 :</td>
            <td><input type="text" name="nama" placeholder="Dosen Pembimbing 2"></td>
        </tr>
        <tr>
            <td>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Upload File: <input type="file" name="berkas" />
        <input type="submit" name="upload" />
    </form> 
</td> 
<tr>
            <td colspan="2"><input type="submit" value="Registrasi"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Batal"></td>
        </tr>
    </table>
</body>
</html>