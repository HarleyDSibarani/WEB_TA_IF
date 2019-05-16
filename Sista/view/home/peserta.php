  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb-5">
        <h2 class="text-primary">Daftar Peserta Tugas Akhir</h2>
        <hr>
        <div class="table-responsive ">
            <table class="table table-hover table-striped table-bordered" id="dataTables-example">
                <thead class="bg-dark text-white">
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Judul TA</th>
                    <th>Dosen Wali</th>
                    <th>Dosen Pembimbing 1</th>
                    <th>Dosen Pembimbing 2</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Seminar Proposal</th>
                    <th>Tanggal Seminar Hasil</th>
                    <th>Tanggal Sidang TA</th>
                </thead>
                <tbody>
                <?php  $i=1; foreach($mahasiswa as $mahasiswa) { ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><img src="<?php echo base_url('./assets/upload/mhs/image/thumbs/'.$mahasiswa->foto)?>" class="img img-responsive img-thumbnail" width="60"></td>
                        <td><?php echo $mahasiswa->nama_mhs?></td>
                        <td><?php echo $mahasiswa->nim?></td>
                        <td><?php echo $mahasiswa->judul?></td>
                        <td><?php echo $mahasiswa->nama_dosen_wali?></td>
                        <td><?php echo $mahasiswa->nama_dospem1?></td>
                        <td><?php echo $mahasiswa->nama_dospem2?></td>
                        <td><?php echo $mahasiswa->tgl_daftar?></td>
                        <td><?php if(count($mahasiswa->tgl_seminar_proposal) == 1){ echo date("D , d-F-Y",strtotime($mahasiswa->tgl_seminar_proposal)).' <br> '.date('H:i',strtotime($mahasiswa->wkt_pro)); } ?></td>
                        <td><?php if(count($mahasiswa->tgl_seminar_hasil) == 1){ echo date("D , d-F-Y",strtotime($mahasiswa->tgl_seminar_hasil)).' <br> '.date('H:i',strtotime($mahasiswa->wkt_has)); } ?></td>
                        <td><?php if(count($mahasiswa->tgl_sidang) == 1){ echo date("D , d-F-Y",strtotime($mahasiswa->tgl_sidang)).' <br> '.date('H:i',strtotime($mahasiswa->wkt_sid)); } ?></td>
                    </tr>
                <?php $i++; } ?> 
                </tbody>
            </table>
        </div>
        <hr>
    </div>

