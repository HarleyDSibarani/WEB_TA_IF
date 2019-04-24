
    <button class="btn-lg btn-primary text-center" data-toggle="modal" data-target=".bd-example-modal-lg" title="Daftar TA 1">Daftar Sidang</button>

<br>
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h2 class="modal-title text-primary" id="myModalLabel">Pendaftaran TA 1</h2>
                </div>
                <div class="modal-body">
                    <?php
                    echo validation_errors('<div class="alert alert-warning">','</div>');
                    echo form_open_multipart(base_url('/mahasiswa/'));
                    ?>      
                    <div class="col-md-12">
                        <div class="form-group form-group-md">
                            <label class="text-info">Judul Tugas Akhir</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required>
                        </div>
                    </div> 

                    <div class="col-md-12">
                        <div class="form-group form-group-md">
                            <label class="text-info">Dosen wali</label>
                            <select name="doswal" class="form-control" required>
                            <?php foreach ($dosen_wali as $dosen) { ?>
                            <option value="<?php echo $dosen->id_dosen_wali ?>">
                            <?php echo $dosen->nama_dosen_wali ?>
                            </option>
                        <?php  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group form-group-md">
                            <label class="text-info">Dosen Pembimbing 1</label>
                            <input type="text" name="dospem1" list="dospem1" class="form-control" placeholder="others ..." required>
                            <datalist id="dospem1" >
                                <?php foreach ($dosen_pembimbing_1 as $dosen1) { ?>
                                    <option value=" <?php echo $dosen1->nama_dospem ?>">
                                    <?php echo $dosen1->id_dospem1 ?>
                                    </option>    
                                <?php  } ?>
                            </datalist>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group form-group-md">
                            <label class="text-info">Dosen Pembimbing 2</label>
                            <select name="dospem2" class="form-control" required>
                            <?php foreach ($dosen_pembimbing_2 as $dosen2) { ?>
                            <option value="<?php echo $dosen2->id_dospem2 ?>">
                            <?php echo $dosen2->nama_dospem ?>
                            </option>
                        <?php  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group form-group-md">
                            <label class="text-info">File Uploud</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
                            <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
                        </div>
                    </div>

                        <?php
                        echo form_close();
                        ?>
                        </div>
                        <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
