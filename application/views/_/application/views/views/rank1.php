<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">RANK <?php echo substr($this->session->userdata('kelas'),1,2);?> Angkatan 57</h1>
            <!-- <p class="card-description">
            Pro tip : Jika kurang nyaman, buka <a href="<?php echo base_url();?>/akun/rekap_btm_full">link ini</a> atau lihat dengan orientasi <i>landscape</i>.
            </p> -->
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabelbtm" class="table table-striped" width="100%">
                <thead>
                <tr>
                  <th>KELAS</th>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>RANK</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($rank->result() as $row) { 
                    ?>
                    
                      <td><?php echo $row->LAS; ?></td>
                      <td><?php echo wordwrap($row->NIM,16,"<br>\n"); ?></td>
                      <td><?php echo $row->NAMA; ?></td>
                      <td><?php echo $row->PERINGKAT; ?></td>
    
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
