  <!-- Navigation -->
  <nav class="navbar navbar-expand-xl navbar-dark fixed-top" style="background-color:#007bff">
    <div class="container">
      <h2 class="navbar-brand " >Sistem Informasi Management Skripsi Online</h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mahasiswa/welcome') ?>">Home<span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mahasiswa/syarat') ?>">Persyaratan</a></li>          
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mahasiswa/profil') ?>">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login_mhs/logout_mhs') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>