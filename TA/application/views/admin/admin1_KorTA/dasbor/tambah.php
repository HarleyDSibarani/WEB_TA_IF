<?php
  echo validation_errors('<div class="alert alert-warning">','</div>');

  echo form_open(base_url('admin/admin1/admin/tambah'));
  
?>
<div class="card">
    <div class="header">
        <h4 class="title">Tambah Data</h4>
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
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Tingkatan</label>
            <select name="tingkatan" class="form-control" required>
            <?php foreach ($tingkatan as $tingkatan) { ?>
            <option value="<?php echo $tingkatan->id_tingkatan ?>">
              <?php echo $tingkatan->nama_tingkatan ?>
            </option>
          <?php  } ?>
            </select>

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
