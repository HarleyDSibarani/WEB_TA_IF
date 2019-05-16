
<div class="col-md-12">
    <?php
    echo validation_errors('<div class="alert alert-warning">','</div>');

    echo form_open_multipart(base_url('admin/syarat'));
    ?>

<input type="hidden" name="id_syarat" value="<?php $syarat->id_syarat?>">

    <div class="card clearfix">
        <div class="header">
            <h4 class="title"><?php echo $title?></h4>
        </div><br>

        <div class="col-md-12">
            <div class="form-group form-group-md">
                <textarea name="isi" class="form-control tinymce editor" placeholder="Isi" rows="35" cols="80" value="<?php echo $syarat->isi_syarat ?>"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form">
                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan Persyaratan">
            </div><br>
        </div>
    </div>

    <?php
    echo form_close();
    ?>

</div>