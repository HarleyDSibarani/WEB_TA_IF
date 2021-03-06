<?php
  echo validation_errors('<div class="alert alert-warning">','</div>');
  echo form_open_multipart(base_url('admin/mahasiswa/tambah'));
  
?>
<div class="card">
    <div class="header">
        <h4 class="title"><?php echo $title?></h4>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Judul Tugas Akhir</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan Username" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Angkatan</label>
            <input type="text" name="angkatan" class="form-control" placeholder="Masukkan Tahun Angkatan" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Dosen wali</label>
            <select name="dospem" class="form-control" required>
            <?php foreach ($dosen as $dosen) { ?>
            <option value="<?php echo $dosen->id_dosen_wali ?>">
              <?php echo $dosen->nama_dosen_wali ?>
            </option>
          <?php  } ?>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Foto Profil</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form">
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
            <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
        </div>
    </div>
</div>

    <?php
    echo form_close();
    ?>