

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Data Admin</h4>
            <p><a href="<?php echo base_url('admin/admin1/admin/tambah') ?>" class="btn btn-primary">
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Tingkatan</th>
                    <th></th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($admin as $admin) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><?php echo $admin->nama?></td>
                        <td><?php echo $admin->username?></td>
                        <td><?php echo $admin->nama_tingkatan?></td>
                        <td>
                            <a href="<?php echo base_url('admin/admin1/admin/edit/'.$admin->id_admin) ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <?php include('hapus.php'); ?>
                        </td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>