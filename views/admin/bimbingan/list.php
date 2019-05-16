<?php
    if ($this->session->flashdata('SUKSES')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('SUKSES');
        echo '</div>';
    }
?>

<?php if ($this->session->userdata('username_admin')) { ?>
    <h3 class="title text-primary text-center">Beban Bimbingan <?php echo $this->session->userdata('nama') ?></h3>
    <div class=" content table-responsive-xl ">
        <table class="table table-hover table-striped"style="padding-right:50px" >
            <thead class="bg-info">
                <th>#</th>
                <th>Dokumen</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Judul Tugas Akhir</th>
                <th>Dosen Wali</th>
                <th>Dosen Pembimbing 1</th>
                <th>Dosen Pembimbing 2</th>
                <th>Tanggal Daftar</th>
                <th>Pesan</th>
            </thead>
            <tbody> 
              <?php  $i=1; foreach($mahasiswa as $mhs) { 
                if ($mhs->status == 1) {?>
                <tr class="odd gradex">
                    <td><?php echo $i?></td>
                    <td><?php echo '<a href="'.base_url('./assets/upload/mhs/file/'.$mhs->dokumen).'">'.$mhs->dokumen.'</a>'?></td>
                    <td><?php echo $mhs->nama_mhs?></td>
                    <td><?php echo $mhs->nim?></td>
                    <td><?php echo $mhs->judul?></td>
                    <td><?php echo $mhs->nama_dosen_wali?></td>
                    <td><?php echo $mhs->nama_dospem1?></td>
                    <td><?php echo $mhs->nama_dospem2?></td>
                    <td><?php echo $mhs->tgl_daftar?></td>
                    <td><a href="<?php echo base_url('admin/bimbingan/pesan/'.$mhs->id_mhs) ?>"class="btn btn-primary btn-sm"><i class="fa fa-send"></i></a></td>
                </tr>
              <?php }$i++; } ?> 
            </tbody>
        </table>
  
<?php  } ?>
<?php if ($this->session->userdata('username_dospem1')) { ?>
    <h3 class="title text-primary text-center">Beban Bimbingan <?php echo $this->session->userdata('nama') ?></h3>
    <div class=" content table-responsive-xl ">
        <table class="table table-hover table-striped"style="padding-right:50px" >
            <thead>
                <th>#</th>
                <th>Dokumen</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Judul Tugas Akhir</th>
                <th>Angkatan</th>
                <th>Dosen Wali</th>
                <th>Dosen Pembimbing 1</th>
                <th>Dosen Pembimbing 2</th>
                <th>Tanggal Daftar</th>
                <th>Pesan</th>
            </thead>
            <tbody> 
              <?php  $i=1; foreach($mahasiswa as $mhs) { 
                if ($this->session->userdata('id_dospem1') == $mhs->id_dospem1 && $mhs->status == 1) {?>
                <tr class="odd gradex">
                    <td><?php echo $i?></td>
                    <td><?php echo '<a href="'.base_url('./assets/upload/mhs/file/'.$mhs->dokumen).'">'.$mhs->dokumen.'</a>'?></td>
                    <td><?php echo $mhs->nama_mhs?></td>
                    <td><?php echo $mhs->nim?></td>
                    <td><?php echo $mhs->judul?></td>
                    <td><?php echo $mhs->angkatan?></td>
                    <td><?php echo $mhs->nama_dosen_wali?></td>
                    <td><?php echo $mhs->nama_dospem1?></td>
                    <td><?php echo $mhs->nama_dospem2?></td>
                    <td><?php echo $mhs->tgl_daftar?></td>
                    <td><a href="<?php echo base_url('admin/bimbingan/pesan/'.$mhs->id_mhs) ?>"class="btn btn-primary btn-sm"><i class="fa fa-send"></i></a></td>
                </tr>
              <?php }$i++; } ?> 
            </tbody>
        </table>
  
<?php  } ?>
<?php if ($this->session->userdata('username_dospem2')) { ?>
     <h3 class="title text-primary text-center">Beban Bimbingan <?php echo $this->session->userdata('nama') ?></h3>
    <div class=" content table-responsive-xl ">
        <table class="table table-hover table-striped"style="padding-right:50px" >
            <thead>
                <th>#</th>
                <th>Dokumen</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Judul Tugas Akhir</th>
                <th>Angkatan</th>
                <th>Dosen Wali</th>
                <th>Dosen Pembimbing 1</th>
                <th>Dosen Pembimbing 2</th>
                <th>Tanggal Daftar</th>
                <th>Pesan</th>
            </thead>
            <tbody> 
              <?php  $i=1; foreach($mahasiswa as $mhs) { 
                if ($this->session->userdata('id_dospem2') == $mhs->id_dospem2 && $mhs->status == 1) {?>
                <tr class="odd gradex">
                    <td><?php echo $i?></td>
                    <td><?php echo '<a href="'.base_url('./assets/upload/mhs/file/'.$mhs->dokumen).'">'.$mhs->dokumen.'</a>'?></td>
                    <td><?php echo $mhs->nama_mhs?></td>
                    <td><?php echo $mhs->nim?></td>
                    <td><?php echo $mhs->judul?></td>
                    <td><?php echo $mhs->angkatan?></td>
                    <td><?php echo $mhs->nama_dosen_wali?></td>
                    <td><?php echo $mhs->nama_dospem1?></td>
                    <td><?php echo $mhs->nama_dospem2?></td>
                    <td><?php echo $mhs->tgl_daftar?></td>
                    <td><a href="<?php echo base_url('admin/bimbingan/pesan/'.$mhs->id_mhs) ?>"class="btn btn-primary btn-sm"><i class="fa fa-send"></i></a></td>
                </tr>
              <?php }$i++; } ?> 
            </tbody>
        </table>
    </div>
<?php  } ?>