<?php

$id_admin    = $this->session->userdata('id_admin');
$admin_aktif = $this->admin_model->detail($id_admin);

?>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title"><?php echo $title?></h4>
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
                    <th>Dokumen</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Judul</th>
                    <th>Email</th>
                    <th>Dosen Wali</th>
                    <th>Dosen Pembimbing 1</th>
                    <th>Dosen Pembimbing 2</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($mahasiswa as $mahasiswa) { ?>
                    <tr class="odd gradex">
                        <td><?php echo $i?></td>
                        <td><img src="<?php echo base_url('./assets/upload/mhs/image/thumbs/'.$mahasiswa->foto)?>" class="img img-responsive img-thumbnail" width="60"></td>
                        <td><?php include('detail.php')?></td>
                        <td><?php echo $mahasiswa->nama_mhs?></td>
                        <td><?php echo $mahasiswa->nim?></td>
                        <td><?php echo $mahasiswa->judul?></td>
                        <td><?php echo $mahasiswa->email?></td>
                        <td><?php echo $mahasiswa->nama_dosen_wali?></td>
                        <td><?php echo $mahasiswa->nama_dospem1?></td>
                        <td><?php echo $mahasiswa->nama_dospem2?></td>
                        <td><?php echo $mahasiswa->tgl_daftar?></td>
                        <td><?php if ($mahasiswa->status == 1 ){
                                    echo "Disetujui";
                                }else{
                                    echo "Pending";   
                                }?>
                        </td>
                        <td><?php if($this->session->userdata('tingkat_admin') == 1  && $this->session->userdata('tingkat_admin') == 3){
                                    include('edit.php');
                                } ?>                                
                        </td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>

        </div>
    </div>
</div>