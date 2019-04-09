

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Data Dosen</h4>
            <p><a href="<?php echo base_url('admin/admin1/dosen_pembimbing/tambah') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i>Tambah</a></p>
        </div>
        <?php
            if ($this->session->flashdata('SUKSES')) {
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('SUKSES');
                echo '</div>';
            }
            ?>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIP/NRK</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Beban Bimbingan</th>
                    <th></th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($dosen as $dosen) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><?php echo $dosen->foto?></td>
                        <td><?php echo $dosen->nama_dosen?></td>
                        <td><?php echo $dosen->nip?></td>
                        <td><?php echo $dosen->email?></td>
                        <td><?php echo $dosen->keterangan?></td>
                        <td><?php echo $dosen->beban?></td>
                        <td>
                            <a href="<?php echo base_url('admin/admin1/dosen_pembimbing/edit/'.$dosen->id_dosen) ?>"class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <?php include('hapus.php'); ?>
                        </td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>