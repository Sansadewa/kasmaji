<!-- <div class="modal" tabindex="-1" role="dialog" id="maaf">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Maaf.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Hai. Perkenalkan, saya admin SIPAJU.<br> Saya minta maaf atas kesalahan teknis yang terjadi sehingga menyebabkan banyak dari isian teman-teman yang mengalami <i>rollback</i>.<br><br>Maka dari itu, dimohon kepada teman-teman untuk mengecek kembali isian pilihan penempatan, dan juga meningatkan yang lain. <br><br> Sekali lagi, maaf. Mohon bantuannya.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Pilihan Angkatan 57</h1>
            <a class="card-description text-danger">
              Silahkan di cek siapatau temennya ada yang ngasal atau belum isi. 
            </a>
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabela" class="table table-striped" width="100%" >
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jenis</th>
                  <th>Daerah Asal</th>
                  <th>Ranking</th>
                  <th>Bersama?</th>
                  <th>Pilihan 1</th>
                  <!-- <th>Kab/Kot 1</th> -->
                  <th>Pilihan 2</th>
                  <!-- <th>Kab/Kot 2</th> -->

                  <th>Pilihan 3</th>
                  <!-- <th>Kab/Kot 3</th> -->
                  
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($pilihan->result() as $row) { ?>
                    <tr>
                      <td><?php echo wordwrap($row->nama,16,"<br>\n"); ?></td>
                      <td><?php echo ($row->jenis_daftar==0)? 'PMDK':'Reguler'; ?></td>
                      <td><?php echo substr($row->asal_pmb,13); ?></td>
                      <td><?php echo $row->ranking; ?></td>
                      <td><?php echo ($row->bersama!=NULL)? 'Ya':'Tidak'; ?></td>
                      <td><?php echo substr($row->daerah1,13); ?></td>
                      <!-- <td><?php echo substr($row->kab_1,0); ?></td> -->
                      <td><?php echo substr($row->daerah2,13); ?></td>
                      <!-- <td><?php echo substr($row->kab_2,0); ?></td> -->

                      <td><?php echo substr($row->daerah3,13); ?></td>
                      <!-- <td><?php echo substr($row->kab_3,0); ?></td> -->

                      
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th>Nama</th>
                  <th>Jenis</th>
                  <th>Daerah Asal</th>
                  <th>Ranking</th>
                  <th>Bersama?</th>
                  <th>Pilihan 1</th>
                  <!-- <th>Kab/Kot 1</th> -->

                  <th>Pilihan 2</th>
                  <!-- <th>Kab/Kot 2</th> -->

                  <th>Pilihan 3</th>
                  <!-- <th>Kab/Kot 3</th> -->

                  
                  
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
