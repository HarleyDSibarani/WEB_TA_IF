
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb-5">
            <?php
                echo validation_errors('<div class="alert alert-warning">','</div>');
                echo form_open_multipart(base_url('/welcome/daftar_ta'));
            
            if ($this->session->flashdata('SUKSES')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('SUKSES');
                echo '</div>';
            }
        ?>

        <p class="alert alert-danger">Untuk Pemilihan Dosen Pembimbing Diharapkan Sudah Melakukan Pertemuan Langsung Dengan Dosen yang Bersangkutan !!</p><br>
        <p class="alert alert-info">Untuk Pemilihan Dosen Pembimbing 1 yang Bukan Dari ITERA Jika Tidak Terdapat di Menu Harap Lapor Ke Sekertaris Prodi</p>
        <hr>

<input type="hidden" name="status" value=0>
<input type="hidden" name="id_tingkatan" value=4>
<input type="hidden" name="foto" value="default.png">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group form-group-md">
                        <label>Judul Tugas Akhir</label>
                        <textarea type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
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
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>Angkatan <span class="text-danger"><small>(Masukkan Hanya Angka)</small></span></label>
                        <input type="number" name="angkatan" class="form-control" placeholder="Masukkan Tahun Angkatan" required>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label>NIM <span class="text-danger"><small>(Masukkan Hanya Angka)</small></span></label>
                        <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                    </div>
                </div>  
            </div>

            <div class="row">
                <div class=" col-md-6">
                    <div class="form-group form-group-md">
                        <label class="text-info">Dosen wali</label>
                        <select name="doswal" class="form-control" required>
                        <?php foreach ($dosen_wali as $dosen) { ?>
                        <option value="<?php echo $dosen->id_dosen_wali ?>">
                        <?php echo $dosen->nama_dosen_wali ?>
                        </option>
                    <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label class="text-info">Upload Form Pendaftaran <span class="text-danger"><small>(Upload Hanya File .pdf)</small></span></label>
                        <input type="file" name="dokumen" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label class="text-info">Dosen Pembimbing 1</label>
                        <select name="dospem1" class="form-control" required>
                            <?php foreach ($dosen_pembimbing_1 as $dosen1) { ?>
                                <option value=" <?php echo $dosen1->id_dospem1 ?>">
                                <?php echo $dosen1->nama_dospem ?>
                                </option>    
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-md">
                        <label class="text-info">Dosen Pembimbing 2</label>
                        <select name="dospem2" class="form-control" required>
                            <?php foreach ($dosen_pembimbing_2 as $dosen2) { ?>
                                <option value="<?php echo $dosen2->id_dospem2 ?>">
                                    <?php echo $dosen2->nama_dospem ?>
                                </option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Daftar">
                        <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
                    </div>
                </div>
            </div>  

                <?php
                echo form_close();
                ?>
                <hr>
        </div>
            