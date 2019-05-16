<?php
  echo validation_errors('<div class="alert alert-warning">','</div>');

  echo form_open(base_url('admin/bimbingan/pesan/'.$mahasiswa->id_mhs));   
?>

 <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title?></h4>
        </div><br>

        <div class="row"></div>
          <div class="col-md-4">
            <div class="form-group form-group-md">
                <label>TO : </label>
                <input type="text" name="to" class="form-control" value="<?php echo $mahasiswa->nama_mhs ?>" readonly required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group form-group-md">
                <label>FROM : </label>
                <input type="text" name="from" class="form-control" value="<?php echo $this->session->userdata('nama') ?>" readonly required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group form-group-md">
                <label>AS : </label>
                <?php 
                  if ($this->session->userdata('tingkat_admin') == 1) {
                    $sebagai = "Koordinator TA" ;
                  }elseif ($this->session->userdata('tingkat_admin') == 3 && $this->session->userdata('id_dospem1')) {
                    $sebagai = "Dosen Pembimbing 1";
                  }elseif ($this->session->userdata('tingkat_admin') == 3 && $this->session->userdata('id_dospem2')) {
                    $sebagai = "Dosen Pembimbing 2";
                  }
                ?>
                <input type="text" name="as" class="form-control" value="<?php echo $sebagai ?>" readonly required>
            </div>
          </div>
        </div>

        <div class="col-md-12">
            <div class="form-group form-group-md">
                <textarea name="isi" class="form-control tinymce editor" placeholder="Isi" rows="35" cols="80"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form">
                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim">
            </div><br>
        </div>
    </div>

<?php form_close(); ?>
               