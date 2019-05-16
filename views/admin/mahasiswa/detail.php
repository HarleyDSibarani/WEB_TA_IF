
<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $mahasiswa->id_mhs ?>"><i class="fa fa-search-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $mahasiswa->id_mhs ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $mahasiswa->nama_mhs ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed width="870" height="450" src="<?php echo base_url('./assets/upload/mhs/file/'.$mahasiswa->dokumen) ?>" type="application/pdf"></embed>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>