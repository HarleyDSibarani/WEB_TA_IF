<?php

$id_admin    = $this->session->userdata('id_admin');
$admin_aktif = $this->admin_model->detail($id_admin);
?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title"><?php echo $title ?></h4>
                <p><a href="<?php echo base_url('admin/dosen_pembimbing_1/tambah') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i>Tambah</a></p>
        </div>
        <?php
            if ($this->session->flashdata('SUKSES')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('SUKSES');
                echo '</div>';
            }elseif ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            ?>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead class="bg-info">
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIP/NRK</th>
                    <th>Email</th>
                    <th>Asal</th>
                    <th>Keterangan</th>
                    <th></th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($dosen as $dospem1) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><img src="<?php echo base_url('./assets/upload/dosen/image/thumbs/'.$dospem1->foto)?>" class="img img-responsive img-thumbnail" width="60"></td>
                        <td><?php echo $dospem1->nama_dospem?></td>
                        <td><?php echo $dospem1->nip?></td>
                        <td><?php echo $dospem1->email?></td>
                        <td><?php echo $dospem1->asal?></td>
                        <td><?php echo $dospem1->keterangan?></td>
                        <td><a href="<?php echo base_url('admin/dosen_pembimbing_1/edit/'.$dospem1->id_dospem1) ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <?php include('hapus.php'); ?>
                        </td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>