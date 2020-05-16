<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Topik Skripsi Angkatan 57</h1>
            <p class="card-description">
            Pro tip : Jika kurang nyaman, buka <a href="<?php echo base_url();?>/akun/fulltopik">link ini</a> atau lihat dengan orientasi <i>landscape</i>.
            </p>
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabel" class="table table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Dosen Pembimbing</th>
                  <th>Topik</th>
                  <th>Metode</th>
                  <th>Kelompok Tema</th>
                  <th>Platform</th>
                  <th>Variabel Y</th>
                  <th>Lokus Penelitian</th>
                  <th>Periode</th>
                  <th>Sumber Data</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($topik->result() as $row) { ?>
                    <tr>
                      <td><?php echo $row->nim; ?></td>
                      <td><?php echo wordwrap($row->nama,16,"<br>\n"); ?></td>
                      <td><?php echo $row->kelas; ?></td>
                      <td><?php echo $row->dosbing; ?></td>
                      <td><?php echo wordwrap($row->topik,40,"<br>\n"); ?></td>
                      <td><?php echo wordwrap($row->metode,30,"<br>\n"); ?></td>
                      <td><?php echo $row->kelompok_tema; ?></td>
                      <td><?php echo wordwrap($row->platform,30,"<br>\n"); ?></td>
                      <td><?php echo wordwrap($row->y,30,"<br>\n"); ?></td>
                      <td><?php echo $row->lokus; ?></td>
                      <td><?php echo $row->periode; ?></td>
                      <td><?php echo wordwrap($row->sumberdata,30,"<br>\n"); ?></td>
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
