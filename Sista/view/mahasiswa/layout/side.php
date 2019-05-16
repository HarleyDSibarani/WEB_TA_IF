<div class="col-md-4 mb-auto">				<br>
        <div class="card border-primary mb-4">
          <div class="card-body ">
          <?php
            $id_mhs    = $this->session->userdata('id_mhs');
            $mhs_aktif = $this->mhs_model->detail($id_mhs);
          ?>
              <div class="card-header text-white bg-primary text-center"><?php echo $mhs_aktif->nama_mhs?> ( <?php echo $mhs_aktif->nim?> )</div>
          </div>
        </div>

				<aside class="sidebar">
					<div class="card border-primary mb-4">
            <div class="card-body">
              <div id="clock" class="card-header bg-primary text-white text-center"></div>
              <script type="text/javascript">

                function showTime(){
                  var date = new Date();
                  var h = date.getHours();
                  var m = date.getMinutes();
                  var s = date.getSeconds();
                  var session = "A.M";
                    if(h==0){
                      h=12;
                    }
                    if(h>12){
                      h= h-12;
                      session= "P.M";
                    }
                  h = (h<10) ? "0" + h : h;
                  m = (m<10) ? "0" + m : m;
                  s = (s<10) ? "0" + s : s;
                  var time = h + ":" + m + ":" + s + " " + session;
                  document.getElementById("clock").innerText = time;
                  document.getElementById("clock").textContent = time;

                  setTimeout(showTime, 1000);
                }
                  showTime();
                </script>
            </div>
					</div>
				</aside>

        <div class="card border-primary mb-4 text-center">
          <div class="card-body ">
            <div class="btn-lg btn-primary text-center">
              <a class="text-light" href="<?php echo base_url('mahasiswa/seminar/daftar_seminar_proposal') ?>" class="btn btn-primary">Daftar Seminar Proposal</a>
            </div>
            <br>
            <div class="btn-lg btn-primary text-center">
              <a class="text-light" href="<?php echo base_url('mahasiswa/seminar/daftar_seminar_hasil') ?>" class="btn btn-primary">Daftar Seminar Hasil</a>
            </div>
            <br>
            <div class="btn-lg btn-primary text-center">
              <a class="text-light" href="<?php echo base_url('mahasiswa/sidang/daftar_sidang') ?>" class="btn btn-primary">Daftar Sidang 1</a>
            </div>
            <br>  
            <div class="btn-lg btn-primary text-center">
              <a class="text-light" href="<?php echo base_url('mahasiswa/welcome/peserta')?>">Daftar Peserta Tugas Akhir</a>
            </div>
          </div>
        </div>
        <div class="card border-primary mb-4 ">
          <div class="card-body ">
          <div class="card-header text-white bg-primary text-center">Download Dokumen Tugas Akhir</div>
          <br>
          <div class="pl-4">
              <?php $i=1; foreach ($dokumen as $dokumen) { ?>
               <?php echo $i ;?>. <a href="<?php echo base_url('./assets/upload/dosen/file/'.$dokumen->file) ?>"><?php echo $dokumen->judul ?></a><br>
              <?php $i++; } ?>
              </div>
          </div>
        </div>
        <div class="card border-primary mb-4">
          <div class="card-body ">
            <div class="card-header text-white bg-primary text-center">Jadwal Acara Tugas Akhir per 7 Hari</div><br>
            <div class="text-center">
              <?php
                $date = date('Y-m-d', strtotime('+0 day')); //tomorrow date
                $weekOfdays = array();
                $begin = new DateTime($date);
                $end = new DateTime($date);
                $end = $end->add(new DateInterval('P7D'));
                $interval = new DateInterval('P1D');
                $daterange = new DatePeriod($begin, $interval ,$end);

                foreach($daterange as $dt){
                  echo '<a href="'.base_url(include 'jadwal.php').'"><br></a>';
                }
              ?>
            </div>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </div>
  <!-- /.container -->