<?php
  echo validation_errors('<div class="alert alert-warning">','</div>');
  echo form_open_multipart(base_url('admin/admin1/mahasiswa/edit/'.$mahasiswa->id_mhs));
  
?>
<div class="card">
    <div class="header">
        <h4 class="title">Tambah Data</h4>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo $mahasiswa->nama_mhs ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $mahasiswa->username ?>" readonly disable required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
        <label>Password <span class="text-danger"><small>(Password Minimal 8 karakter atau Biarkan Kosong)</small></span></label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" >
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Masukkan Email" value="<?php echo $mahasiswa->email ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Angkatan</label>
            <input type="text" name="angkatan" class="form-control" placeholder="Masukkan Tahun Angkatan" value="<?php echo $mahasiswa->angkatan ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Dosen Pembimbing</label>
            <select name="dospem1" class="form-control" required>
            <?php foreach ($dosen as $dosen) { ?>
            <option value="<?php echo $dosen->id_dosen ?>">
            <?php if($mahasiswa->id_dosen1 == $dosen->id_dosen) { echo "selected"; } ?>
              <?php echo $dosen->nama_dosen ?>
            </option>
          <?php  } ?>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" value="<?php echo $mahasiswa->nim ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Tanggal Daftar</label>
            <input type="text" name="tgl_daftar" class="form-control" placeholder="Tanggal Daftar" value="<?php echo $mahasiswa->tgl_daftar ?>" >
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Tanggal Seminar</label>
            <input type="text" name="tgl_seminar" class="form-control" placeholder="Tanggal Seminar" value="<?php echo $mahasiswa->tgl_seminar ?>" >
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Tanggal Sidang</label>
            <input type="text" name="tgl_sidang" class="form-control" placeholder="Tanggal Sidang" value="<?php echo $mahasiswa->tgl_sidang ?>" >
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Foto Profil</label>
            <input type="file" name="foto" class="form-control" >
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