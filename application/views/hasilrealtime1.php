
<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
              <h1 class="card-title">Hasil Simulasi Realtime Siklus 1, Angkatan 57 <a class="text-danger"></a></h1>

            
            <div class="card-description">
              <ul class="text-info"><li>Apabila tidak mendapatkan pilihan 1, 2, dan 3. Anda akan diberi label <b>"TAK DAPAT"</b></li></ul><br>
            </div> <hr>
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabela" class="table table-striped" width="100%" >
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Daerah Asal</th>
                  <th>Jenis</th>
                  <th style="width:20vh;">Ranking</th>
                  <th>Bersama?</th>
                  <th>Pilihan 1</th>
                  <!-- <th>Kab/Kot 1</th> -->

                  <th>Pilihan 2</th>
                  <!-- <th>Kab/Kot 2</th> -->

                  <th>Pilihan 3</th>
                  <!-- <th>Kab/Kot 3</th> -->

                  <th>Pilihan Fix</th>
                  <?php if($this->session->userdata('nim')=='15.8636'){ ?>
                  <th>Prodi</th>
                  <?php } ?>
                  
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($pilihan->result() as $row) { ?>
                    <tr color=" <?php echo ($row->jenis_daftar==0)? 'red':''; ?> ">
                      <td><?php echo wordwrap($row->nama,16,"<br>\n"); ?></td>
                      <td><?php echo substr($row->asal_pmb,13); ?></td>
                      <td><?php echo ($row->jenis_daftar==0)? 'PMDK':'Reguler'; ?></td>
                      <td style="width:20vh;"><?php echo $row->ranking; ?></td>
                      <td><?php echo ($row->bersama!=NULL)? 'Ya':'Tidak'; ?></td>
                      <td><?php echo substr($row->daerah1,13); ?></td>
                      <!-- <td><?php echo substr($row->kab_1,0); ?></td> -->
                      <td><?php echo substr($row->daerah2,13); ?></td>
                      <!-- <td><?php echo substr($row->kab_2,0); ?></td> -->

                      <td><?php echo substr($row->daerah3,13); ?></td>
                      <!-- <td><?php echo substr($row->kab_3,0); ?></td> -->

                      <td><?php echo substr($row->daerah_fix,13); ?></td>
                      <?php if($this->session->userdata('nim')=='15.8636'){ ?>
                       <td><?php echo $row->prodi; ?></td>
                   <?php } ?>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th>Nama</th>
                  <th>Daerah Asal</th>
                  <th>Jenis</th>
                  <th style="width:20vh;">Ranking</th>
                  <th>Bersama?</th>
                  <th>Pilihan 1</th>
                  <!-- <th>Kab/Kot 1</th> -->

                  <th>Pilihan 2</th>
                  <!-- <th>Kab/Kot 2</th> -->

                  <th>Pilihan 3</th>
                  <!-- <th>Kab/Kot 3</th> -->

                  <th>Pilihan Fix</th>
                  <?php if($this->session->userdata('nim')=='15.8636'){ ?>
                  <th>Prodi</th>
                  <?php } ?>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
