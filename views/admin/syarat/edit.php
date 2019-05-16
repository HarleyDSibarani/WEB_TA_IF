<button class="btn btn-info btn-sm" data-toggle="modal"
        data-target="#myModaldel<?php echo $dokumen->id_dokumen ?>"
        title="Edit Dokumen">
        <i class="fa fa-edit"></i>
</button>
    <div class="modal fade" id="myModaldel<?php echo $dokumen->id_dokumen ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?php echo $dokumen->judul ?> ?</h4>
                </div>
                
                   <?php
                      echo validation_errors('<div class="alert alert-warning">','</div>');

                      echo form_open(base_url('admin/syarat/edit_dokumen/'.$dokumen->id_dokumen));   
                    ?>
                      <div class="card clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-md">
                              <label><h5>Judul</h5></label>
                              <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" value="<?php echo $dokumen->judul ?>" required>
                            </div>
                        </div>
                      </div>

                      <div class="card clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-md">
                                <label><h5>Upload Dokumen</h5></label>
                                <input type="file" name="file" class="form-control" placeholder="Masukkan File" value="<?php echo $dokumen->judul ?>">
                            </div>
                        </div>
                      </div>

                <div class="modal-footer">
                  <input type="submit" name="submit" class="btn btn-primary btn-md" value="Save">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <?php
                    echo form_close();
                    ?>  
            </div>
        </div>
    </div>


       