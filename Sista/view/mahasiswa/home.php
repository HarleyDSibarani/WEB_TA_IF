
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb-5">
        <h2 class="text-primary">Dosen Pembimbing 1</h2>
    
          <hr>
          <div class="row">
            <?php  $i=1; foreach($dosen_pembimbing_1 as $dospem1) { ?>
              <?php if ($dospem1->asal == "ITERA") { ?>
                <div class="col-md-4 lg p-1">
                <div class="card border-primary " style="height:90%;">
                  <div class="card-body">
                    <h5 class="card-title"><a href="<?php echo base_url('mahasiswa/bimbingan1/read1/'.$dospem1->id_dospem1) ?>"><?php echo $dospem1->nama_dospem ?></a></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $dospem1->email ?></h6>
                    <p class="card-text">NRK : <?php echo $dospem1->nip ?></p>
                    <p class="card-text">Jumlah Beban Bimbingan : 0<?php foreach ($beban1 as $key) {
                                                                          if($dospem1->id_dospem1 == $key->id_dospem1){
                                                                            echo ($key->beban1);
                                                                          }
                                                                        }  
                                                                    ?>
                    </p>
                    <p></p>
                  </div>
                </div>
              </div>
             <?php } ?>
            <?php $i++; } ?> 
          </div>
          <hr>

          <div class="table-responsive ">
            <table class="table table-hover table-striped table-bordered" id="dataTables-example">
              <thead class="bg-dark text-white">
                <th>#</th>
                <th>Nama Dosen Pembimbing 1 Lain</th>
                <th>Beban Bimbingan</th>
              </thead>
              <tbody>
              <?php  $i=1; foreach($dosen_pembimbing_1 as $dospem1) { ?>
                <?php if ($dospem1->asal == "LAIN") { ?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><a class="text-primary text-center" href="<?php echo base_url('mahasiswa/bimbingan1/read1/'.$dospem1->id_dospem1) ?>" ><?php echo $dospem1->nama_dospem ?></a></td>
                    <td>0<?php foreach ($beban1 as $key) {
                          if($dospem1->id_dospem1 == $key->id_dospem1){
                            echo ($key->beban1);
                          } 
                        }  ?>
                    </td>
                  </tr>
                <?php } ?>
              <?php $i++; } ?> 
              </tbody>
            </table>
          </div>
          <hr>
          <h2 class="text-primary">Dosen Pembimbing 2</h2>
          <hr>
            <div class="row">
              <?php  $i=1; foreach($dosen_pembimbing_2 as $dospem2) { ?>
                <div class="col-md-4 lg p-1">
                  <div class="card border-primary " style="height:90%;">
                    <div class="card-body">
                      <h5 class="card-title"><a href="<?php echo base_url('mahasiswa/bimbingan2/read2/'.$dospem2->id_dospem2) ?>"><?php echo $dospem2->nama_dospem ?></a></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo $dospem2->email ?></h6>
                      <p class="card-text">NRK : <?php echo $dospem2->nip ?></p>
                      <p class="card-text">Jumlah Beban Bimbingan : 0<?php foreach ($beban2 as $key) {
                                                                            if($dospem2->id_dospem2 == $key->id_dospem2){
                                                                              echo ($key->beban2);
                                                                            }
                                                                          }  
                                                                      ?>
                      </p>
                      <p></p>
                    </div>
                  </div>
              </div>
            <?php $i++; } ?> 
          </div>    
      </div>
      

