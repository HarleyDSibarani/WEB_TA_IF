
<div class="col-md-12"><br>
    <?php
    echo validation_errors('<div class="alert alert-warning">','</div>');

    echo form_open_multipart(base_url('admin/syarat/upload_dok'));

    if ($this->session->flashdata('SUKSES')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('SUKSES');
        echo '</div>';
    }

    ?>

    <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title?></h4>
        </div><br>

        <div class="col-md-4">
            <div class="form-group form-group-md">
            <label>Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group form-group-md">
            <label>Upload Dokumen</label>
                <input type="file" name="file" class="form-control" placeholder="Masukkan File">
            </div>
        </div>            

        <div class="col-md-12">
            <div class="form">
                <input type="submit" name="submit" class="btn btn-primary btn-md" value="Upload">
            </div><br>
        </div>
    </div>

    <?php
    echo form_close();
    ?>
</div>
    <div class="col-md-12">
        <div class="card clearfix">
            <div class="header">
                <h4 class="title"><?php echo $title?></h4>
            </div>   
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>#</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Tanggal Upload</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php  $i=1; foreach($dokumen as $dokumen) { ?>
                        <tr class="odd gradex">
                            <td><?php echo $i?></td>
                            <td><?php echo $dokumen->judul?></td>
                            <td><?php echo $dokumen->file?></td>
                            <td><?php echo $dokumen->tgl_upload?></td>
                            <td><?php include('edit.php') ?>
                                <?php include('hapus.php') ?></td>         
                        </tr>
                    <?php $i++; } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

