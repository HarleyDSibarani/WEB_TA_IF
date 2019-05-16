
<div class="btn-md btn-primary text-center" data-toggle="modal" data-target="#exampleModalCenter<?php echo $weekOfdays[] = $dt->format('d-F-Y')?>">
	<a class="text-light" ><?php echo $weekOfdays[] = $dt->format('D | d-F-Y')?></a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $weekOfdays[] = $dt->format('d-F-Y')?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $weekOfdays[] = $dt->format('d-F-Y')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		<?php 
			$today = date('d-F-Y');
		
        	
		?>
		<h3>Seminar Proposal</h3>
		
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-bordered">
				<thead class="bg-secondary">
					<tr>
						<th>Nama</th>
						<th>NIM</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Ruangan</th>
					</tr>
				</thead>
				<tbody>
				   <?php foreach($peserta as $peserta) { ?>
                      <?php if( $today == date("d-F-Y",strtotime($peserta->tgl_seminar_proposal))){ ?>
	                    <tr class="odd gradex">
							<td><?php echo $peserta->nama_mhs ?></td>
							<td><?php echo $peserta->nim ?></td>
							<td><?php echo $peserta->judul ?></td>
							<td><?php echo date("d-F-Y",strtotime($peserta->tgl_seminar_proposal))?></td>
							<td><?php echo date("H:i",strtotime($peserta->wkt_pro)) ?></td>
							<td><?php echo $peserta->ruang_pro ?></td>
						</tr>
					   <?php }?>
				   <?php } ?>
				</tbody>
			</table>
		</div>
		<hr>

		<h3>Seminar Hasil</h3>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-bordered">
				<thead class="bg-secondary">
					<tr>
						<th>Nama</th>
						<th>NIM</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Ruangan</th>
					</tr>
				</thead>
				<tbody>
				   <?php foreach($peserta as $hasil) { ?>
                      <?php if($today == date("d-F-Y",strtotime($hasil->tgl_seminar_hasil))){ ?>
	                    <tr class="odd gradex">
							<td><?php echo $hasil->nama_mhs ?></td>
							<td><?php echo $hasil->nim ?></td>
							<td><?php echo $hasil->judul ?></td>
							<td><?php echo date("d-F-Y",strtotime($hasil->tgl_seminar_hasil)) ?></td>
							<td><?php echo date("H:i",strtotime($hasil->wkt_has)) ?></td>
							<td><?php echo $hasil->ruang_has ?></td>
						</tr>
					   <?php }?>
				   <?php } ?>
				</tbody>
			</table>
		</div>
				
		<hr>

		<h3>Sidang Akhir</h3>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-bordered">
				<thead class="bg-secondary">
					<tr>
						<th>Nama</th>
						<th>NIM</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Waktu</th>
					</tr>
				</thead>
				<tbody>
				   <?php foreach($peserta as $sidang) { ?>
                      <?php if($today == date("d-F-Y",strtotime($sidang->tgl_sidang))){ ?>
	                    <tr class="odd gradex">
							<td><?php echo $sidang->nama_mhs ?></td>
							<td><?php echo $sidang->nim ?></td>
							<td><?php echo $sidang->judul ?></td>
							<td><?php echo date("d-F-Y",strtotime($sidang->tgl_sidang)) ?></td>
							<td><?php echo date("H:i",strtotime($sidang->wkt_sid)) ?></td>
						</tr>
					   <?php } ?>
				   <?php } ?>
				</tbody>
			</table>
		</div>
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>