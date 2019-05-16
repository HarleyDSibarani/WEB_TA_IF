<?php

$id_admin    = $this->session->userdata('id_admin');
$admin_aktif = $this->admin_model->detail($id_admin);

?>
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
<?php if ($this->session->userdata('tingkat_admin') == 3) { ?>            
            <div class="col-md-12 hidden">
                <div class="card clearfix">
                    <div class="header">
                        <h4 class="title"><?php echo $title?></h4>
                    </div>   
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead class="bg-info">
                                <th>#</th>
                                <th>Form</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Judul</th>
                                <th>Dosen Wali</th>
                                <th>Dosen Pembimbing 1</th>
                                <th>Dosen Pembimbing 2</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Validasi</th>
                            </thead>
                            <tbody>
                            <?php  $i=1; foreach($mahasiswa as $mahasiswa) { ?>
                                <tr class="odd gradex">
                                    <td><?php echo $i?></td>
                                    <td><?php include('detail.php') ?></td>
                                    <td><?php echo $mahasiswa->nama_mhs?></td>
                                    <td><?php echo $mahasiswa->nim?></td>
                                    <td><?php echo $mahasiswa->judul?></td>
                                    <td><?php echo $mahasiswa->nama_dosen_wali?></td>
                                    <td><?php echo $mahasiswa->nama_dospem1?></td>
                                    <td><?php echo $mahasiswa->nama_dospem2?></td>
                                    <td><?php echo $mahasiswa->tgl_daftar?></td>
                                    <td><?php if ($mahasiswa->status == 1 ){
                                            echo "Disetujui";
                                    }else{
                                        echo "Pending";   
                                    }?></td>
                                    <td><?php include('edit.php') ?></td>
                                    
                                </tr>
                            <?php $i++; } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php }else{ ?>
    <div class="col-md-12">
    <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title?></h4>
        </div>   
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead class="bg-info">
                    <th>#</th>
                    <th>Form</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Judul</th>
                    <th>Dosen Wali</th>
                    <th>Dosen Pembimbing 1</th>
                    <th>Dosen Pembimbing 2</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Validasi</th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($mahasiswa as $mahasiswa) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><?php include('detail.php') ?></td>
                        <td><?php echo $mahasiswa->nama_mhs?></td>
                        <td><?php echo $mahasiswa->nim?></td>
                        <td><?php echo $mahasiswa->judul?></td>
                        <td><?php echo $mahasiswa->nama_dosen_wali?></td>
                        <td><?php echo $mahasiswa->nama_dospem1?></td>
                        <td><?php echo $mahasiswa->nama_dospem2?></td>
                        <td><?php echo $mahasiswa->tgl_daftar?></td>
                        <td><?php if ($mahasiswa->status == 1 ){
                                echo "Disetujui";
                        }else{
                            echo "Pending";   
                        }?></td>
                        <td><?php include('edit.php') ?></td>
                        
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php }?>
<div class="col-md-12">
    <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title1?></h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead class="bg-info">
                    <th>#</th>
                    <th>Form</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Judul</th>
                    <th>Ruangan</th>
                    <th>Tanggal Seminar</th>
                    <th>Waktu Seminar</th>
                    <th>Jenis Seminar</th>
                    <th>Status</th>
                    <th>Validasi</th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($proposal as $proposal) { ?>
                    <?php if($proposal->id_dospem1 == $this->session->userdata('id_dospem1') || $proposal->id_dospem2 == $this->session->userdata('id_dospem2') || $this->session->userdata('tingkat_admin') == 1){ ?>
                        <tr class="odd gradex">
                            <td><?php echo $i?></td>
                            <td><?php include('detail_seminar_proposal.php') ?></td>
                            <td><?php echo $proposal->nama_mhs?></td>
                            <td><?php echo $proposal->nim?></td>
                            <td><?php echo $proposal->judul?></td>
                            <td><?php echo $proposal->ruangan?></td>
                            <td><?php echo $proposal->tgl_seminar_proposal?></td>
                            <td><?php echo $proposal->waktu?></td>
                            <td><?php echo $proposal->jenis; ?></td>
                            <td><?php if ($proposal->status == 1 ){
                                    echo "Disetujui";
                            }else{
                                echo "Pending";   
                            }?></td>
                            <td><?php include('edit_seminar_proposal.php') ?></td>                            
                        </tr>
                    <?php } ?>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title2?></h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead class="bg-info">
                    <th>#</th>
                    <th>Form</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Judul</th>
                    <th>Ruangan</th>
                    <th>Tanggal Seminar</th>
                    <th>Waktu Seminar</th>
                    <th>Jenis Seminar</th>
                    <th>Status</th>
                    <th>Validasi</th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($hasil as $hasil) { ?>
                    <?php if($hasil->id_dospem1 == $this->session->userdata('id_dospem1') || $hasil->id_dospem2 == $this->session->userdata('id_dospem2') || $this->session->userdata('tingkat_admin') == 1){ ?>
                        <tr class="odd gradex">
                            <td><?php echo $i?></td>
                            <td><?php include('detail_seminar_hasil.php') ?></td>
                            <td><?php echo $hasil->nama_mhs?></td>
                            <td><?php echo $hasil->nim?></td>
                            <td><?php echo $hasil->judul?></td>
                            <td><?php echo $hasil->ruangan?></td>
                            <td><?php echo $hasil->tgl_seminar_hasil?></td>
                            <td><?php echo $hasil->waktu?></td>
                            <td><?php echo $hasil->jenis; ?></td>
                            <td><?php if ($hasil->status == 1 ){
                                    echo "Disetujui";
                            }else{
                                echo "Pending";   
                            }?></td>
                            <td><?php include('edit_seminar_hasil.php') ?></td>                            
                        </tr>
                    <?php } ?>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title3?></h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead class="bg-info">
                    <th>#</th>
                    <th>Form</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Judul</th>
                    <th>Tanggal Sidang Proposal</th>
                    <th>Waktu Sidang Proposal</th>
                    <th>Status</th>
                    <th>Validasi</th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($sidang as $sidang) { ?>
                    <?php if($seminar->id_dospem1 == $this->session->userdata('id_dospem1') || $seminar->id_dospem2 == $this->session->userdata('id_dospem2') || $this->session->userdata('tingkat_admin') == 1){ ?>
                        <tr class="odd gradex">
                            <td><?php echo $i?></td>
                            <td><?php include('detail_sidang.php') ?></td>
                            <td><?php echo $sidang->nama_mhs?></td>
                            <td><?php echo $sidang->nim?></td>
                            <td><?php echo $sidang->judul?></td>
                            <td><?php echo $sidang->tanggal?></td>
                            <td><?php echo $sidang->waktu?></td>
                            <td><?php if ($sidang->status == 1 ){
                                    echo "Disetujui";
                            }else{
                                echo "Pending";   
                            }?></td>
                            <td><?php include('edit_sidang.php') ?></td>                            
                        </tr>
                    <?php } ?>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>