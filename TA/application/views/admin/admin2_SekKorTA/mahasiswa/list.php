

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Data Mahasiswa</h4>
            <p><a href="<?php echo base_url('admin/admin2/mahasiswa/tambah') ?>" class="btn btn-primary">
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
                    <th>Username</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Angkatan</th>
                    <th>Dosen Pembimbing</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Seminar</th>
                    <th>Tanggal Sidang</th>
                    <th></th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($mahasiswa as $mahasiswa) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><?php echo $mahasiswa->foto?></td>
                        <td><?php echo $mahasiswa->nama?></td>
                        <td><?php echo $mahasiswa->username?></td>
                        <td><?php echo $mahasiswa->nim?></td>
                        <td><?php echo $mahasiswa->email?></td>
                        <td><?php echo $mahasiswa->angkatan?></td>
                        <td><?php echo $mahasiswa->nama_dosen?></td>
                        <td><?php echo $mahasiswa->tgl_daftar?></td>
                        <td><?php echo $mahasiswa->tgl_seminar?></td>
                        <td><?php echo $mahasiswa->tgl_sidang?></td>
                        <td>
                            <a href="<?php echo base_url('admin/admin2/mahasiswa/edit/'.$mahasiswa->id_mhs) ?>"class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <?php include('hapus.php'); ?>
                        </td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>