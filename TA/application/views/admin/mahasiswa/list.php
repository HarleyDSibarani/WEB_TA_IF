<?php

$id_admin    = $this->session->userdata('id_admin');
$admin_aktif = $this->admin_model->detail($id_admin);

?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title"><?php echo $title?></h4>
            <?php
                if (($admin_aktif->id_tingkatan) != 1 ) {
                    if (($admin_aktif->id_tingkatan) != 2 ) { ?>
                        <p><a href="<?php echo base_url('admin/dosen_pembimbing_1/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Tambah</a></p>
             <?php  }}else { ?>
                    <p><a href="<?php echo base_url('admin/mahasiswa/tambah') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Tambah</a></p>
            <?php } ?>

        </div>
        <?php
            if ($this->session->flashdata('SUKSES')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('SUKSES');
                echo '</div>';
            }elseif ($this->session->flashdata('level')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('level');
                echo '</div>';
            }
            ?>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Angkatan</th>
                    <th>Dosen Wali</th>
                    <th></th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($mahasiswa as $mahasiswa) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><img src="<?php echo base_url('./assets/upload/mhs/image/thumbs/'.$mahasiswa->foto)?>" class="img img-responsive img-thumbnail" width="60"></td>
                        <td><?php echo $mahasiswa->nama_mhs?></td>
                        <td><?php echo $mahasiswa->username?></td>
                        <td><?php echo $mahasiswa->nim?></td>
                        <td><?php echo $mahasiswa->email?></td>
                        <td><?php echo $mahasiswa->angkatan?></td>
                        <td><?php echo $mahasiswa->nama_dosen_wali?></td>
                        <td><?php if (($admin_aktif->id_tingkatan) != 1) {
                                  }else { ?>
                                    <a href="<?php echo base_url('admin/mahasiswa/edit/'.$mahasiswa->id_mhs) ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <?php include('hapus.php'); ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>