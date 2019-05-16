<button class="btn btn-info btn-sm" data-toggle="modal"
        data-target="#myModal<?php echo $mahasiswa->id_mhs ?>"
        title="ACC">
        <i class="fa fa-edit"></i>
</button>
    <div class="modal fade" id="myModal<?php echo $mahasiswa->id_mhs ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Validasi <?php echo $mahasiswa->nama_mhs ?> ?</h4>
                </div>
                
                   <?php
                      echo validation_errors('<div class="alert alert-warning">','</div>');

                      echo form_open(base_url('admin/notifikasi/edit/'.$mahasiswa->id_mhs));   
                    ?>
                      <input type="hidden" name="status" class="form-control" value="1" required>

               
                <div class="modal-footer">
                  <input type="submit" name="submit" class="btn btn-primary btn-md" value="YA">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <?php
                    echo form_close();
                    ?>  
            </div>
        </div>
    </div>


       