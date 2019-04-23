<?php
  echo validation_errors('<div class="alert alert-warning">','</div>');

  echo form_open(base_url('admin/admin2/dosen_pembimbing/edit/'.$dosen->id_dosen));
  
?>
<div class="card">
    <div class="header">
        <h4 class="title">Edit Data</h4>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo $dosen->nama_dosen ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>NIP/NRK</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP/NRK" value="<?php echo $dosen->nip ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Masukkan Email" value="<?php echo $dosen->email ?>" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Keterangan</label>
            <textarea type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" ><?php echo $dosen->keterangan ?></textarea>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-group-md">
            <label>Beban Bimbingan</label>
            <input type="text" name="beban" class="form-control" placeholder="Masukkan Beban Bimbingan" value="<?php echo $dosen->beban ?>" required>
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
