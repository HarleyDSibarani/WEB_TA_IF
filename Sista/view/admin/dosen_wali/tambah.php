<?php
  echo validation_errors('<div class="alert alert-warning">','</div>');

  echo form_open(base_url('admin/dosen_wali/tambah'));
  
?>
<div class="card clearfix">
    <div class="header">
        <h4 class="title"><?php echo $title?></h4>
    </div><br>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>NIP/NRK</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP/NRK" required>
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
            <label>Keterangan</label>
            <textarea type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required></textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form">
            <input type="submit" name="submit" class="btn btn-primary btn-md" value="Save">
            <input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
        </div><br>
    </div>
</div>


    <?php
    echo form_close();
    ?>
