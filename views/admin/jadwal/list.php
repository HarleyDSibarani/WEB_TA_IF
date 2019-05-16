<?php

    $id_admin    = $this->session->userdata('id_admin');
    $admin_aktif = $this->admin_model->detail($id_admin);

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

    <div class="col-md-12">
        <div class="card clearfix">
            <div class="header">
                <h4 class="title"><?php echo $title1?></h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead class="bg-info">
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Judul</th>
                        <th>Ruangan</th>
                        <th>Tanggal Seminar</th>
                        <th>Waktu Seminar</th>
                        <th>Jenis Seminar</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php  $i=1; foreach($proposal as $proposal) { ?>
                            <?php if($proposal->status == 1){ ?>
                                <tr class="odd gradex">
                                    <td><?php echo $i?></td>
                                    <td><?php echo $proposal->nama_mhs?></td>
                                    <td><?php echo $proposal->nim?></td>
                                    <td><?php echo $proposal->judul?></td>
                                    <td><?php echo $proposal->ruangan?></td>
                                    <td><?php echo date("d-F-Y",strtotime($proposal->tgl_seminar_proposal))?></td>
                                    <td><?php echo date("H:i",strtotime($proposal->waktu))?></td>
                                    <td><?php echo $proposal->jenis; ?></td>
                                    <td><?php if ($proposal->status == 1 ){
                                                echo "Disetujui";
                                              }else{
                                                echo "Pending";   
                                              }?>                                        
                                    </td>                        
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
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Judul</th>
                        <th>Ruangan</th>
                        <th>Tanggal Seminar</th>
                        <th>Waktu Seminar</th>
                        <th>Jenis Seminar</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php  $i=1; foreach($hasil as $hasil) { ?>
                            <?php if($hasil->status == 1){ ?>
                                <tr class="odd gradex">
                                    <td><?php echo $i?></td>
                                    <td><?php echo $hasil->nama_mhs?></td>
                                    <td><?php echo $hasil->nim?></td>
                                    <td><?php echo $hasil->judul?></td>
                                    <td><?php echo $hasil->ruangan?></td>
                                    <td><?php echo date("d-F-Y",strtotime($hasil->tgl_seminar_hasil))?></td>
                                    <td><?php echo date("H:i",strtotime($hasil->waktu))?></td>
                                    <td><?php echo $hasil->jenis; ?></td>
                                    <td><?php if ($hasil->status == 1 ){
                                                echo "Disetujui";
                                              }else{
                                                echo "Pending";   
                                              }?>                                        
                                    </td>                       
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
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Judul</th>
                        <th>Tanggal Sidang Proposal</th>
                        <th>Waktu Sidang Proposal</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php  $i=1; foreach($sidang as $sidang) { ?>
                            <?php if($sidang->status == 1){ ?>
                                <tr class="odd gradex">
                                    <td><?php echo $i?></td>
                                    <td><?php echo $sidang->nama_mhs?></td>
                                    <td><?php echo $sidang->nim?></td>
                                    <td><?php echo $sidang->judul?></td>
                                    <td><?php echo date("d-F-Y",strtotime($sidang->tgl_ssidang))?></td>
                                    <td><?php echo date("H:i",strtotime($sidang->waktu))?></td>
                                    <td><?php if ($sidang->status == 1 ){
                                                echo "Disetujui";
                                              }else{
                                                echo "Pending";   
                                              }?>                                        
                                    </td>                           
                                </tr>
                            <?php } ?>
                        <?php $i++; } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>