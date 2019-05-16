
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $mhs_aktif->id_mhs ?>"><i class="fa fa-search"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $mhs_aktif->id_mhs ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $mhs_aktif->nama_mhs ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed width="770" height="450" src="<?php echo base_url('./assets/upload/mhs/file/'.$mhs_aktif->dokumen) ?>" type="application/pdf"></embed>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>