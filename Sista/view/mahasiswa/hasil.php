
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb-5">
            <?php
                echo validation_errors('<div class="alert alert-warning">','</div>');
                echo form_open_multipart(base_url('/mahasiswa/seminar/daftar_seminar_hasil'));

                $id_mhs    = $this->session->userdata('id_mhs');
                $mhs_aktif = $this->mhs_model->detail($id_mhs);

                if ($this->session->flashdata('SUKSES')) {
                    echo '<div class="alert alert-success">';
                    echo $this->session->flashdata('SUKSES');
                    echo '</div>';
                }
        ?>

        <p class="alert alert-danger">Lihat Di Menu Profile Untuk Informasi Di ACC atau Tidak</p><br>

        <input type="hidden" name="status" value=0>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" readonly placeholder="Masukkan Nama" value="<?php echo $mhs_aktif->nama_mhs ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>NIM <span class="text-danger"><small>(Masukkan Hanya Angka)</small></span></label>
                        <input type="number" name="nim" class="form-control" readonly placeholder="Masukkan NIM" value="<?php echo $mhs_aktif->nim ?>">
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group form-group-md">
                        <label>Judul Tugas Akhir</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" value="<?php echo $mhs_aktif->judul ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>Jenis Seminar</label>
                        <input type="text" name="jenis" class="form-control" value="Hasil" readonly>                        
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>Upload Form Seminar <span class="text-danger"><small>(Upload Hanya File .pdf)</small></span></label>
                        <input type="file" name="form" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-md">
                        <label>Ruangan<span class="text-danger"><small>(Pinjam Ke Akademik)</small></span></label>
                        <input type="text" name="ruangan" class="form-control" placeholder="Masukkan Ruangan">
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group form-group-md">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-md">
                        <label>Waktu</label>
                        <input type="time" name="waktu" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Ajukan">
                        <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
                    </div>
                </div>
            </div>  

                <?php
                echo form_close();
                ?>
        </div>
            