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
                    <h4 class="modal-title" id="myModalLabel">Ubah Dosen Pembimbing <?php echo $mahasiswa->nama_mhs ?> ?</h4>
                </div>
                
                   <?php
                      echo validation_errors('<div class="alert alert-warning">','</div>');

                      echo form_open(base_url('admin/mahasiswa/edit/'.$mahasiswa->id_mhs));   
                    ?>
                    <div class="card clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-md">
                                <label><h5>Dosen Pembimbing 1</h5></label>
                                <select name="dospem1" class="form-control" required>
                                <?php foreach ($dosen1 as $dosen) { ?>
                                    <option value="<?php echo $dosen->id_dospem1 ?>"
                                    <?php if($mahasiswa->id_dospem1 == $dosen->id_dospem1) { echo 'selected';} ?>>
                                      <?php echo $dosen->nama_dospem ?>
                                    </option>
                                <?php  } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-md">
                                <label><h5>Dosen Pembimbing 2</h5></label>
                                <select name="dospem2" class="form-control" required>
                                <?php foreach ($dosen2 as $dosen) { ?>
                                    <option value="<?php echo $dosen->id_dospem2 ?>"
                                    <?php if($mahasiswa->id_dospem2 == $dosen->id_dospem2) { echo 'selected';} ?>>
                                      <?php echo $dosen->nama_dospem ?>
                                    </option>
                                <?php  } ?>
                                </select>
                            </div>
                        </div>
                    </div>
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