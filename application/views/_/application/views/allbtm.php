<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Topik Skripsi Angkatan 57</h1>
            <p class="card-description">
            Pro tip : Jika kurang nyaman, buka <a href="<?php echo base_url();?>/akun/rekap_btm_full">link ini</a> atau lihat dengan orientasi <i>landscape</i>.
            </p>
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabelbtm" class="table table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Panggilan</th>
                  <th>Kelas</th>
                  <th>Email</th>
                  <th>Himada</th>
                  <th>Kab/Kota</th>
                  <th>Provinsi</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($btm->result() as $row) { 
                    $namapanggilan=$row->namapanggilan;
                    $email=$row->email_personal;
                    $himada=$row->himada;
                    $kabkot=$row->kabkot;
                    $provinsi=$row->provinsi;
                    if (empty($namapanggilan) || empty($email) || empty($himada)  || empty($kabkot) || empty($provinsi)){
                      $status='Belum Lengkap';
                    } else { $status= 'Lengkap';}
                    ?>
                    <tr class="<?php if($status=='Lengkap'){echo 'table-success';}else{echo 'table-danger';} ?>">
                      <td><?php echo $row->nim; ?></td>
                      <td><?php echo wordwrap($row->nama,16,"<br>\n"); ?></td>
                      <td><?php echo wordwrap($namapanggilan,16,"<br>\n"); ?></td>
                      <td><?php echo $row->kelas; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $himada; ?></td>
                      <td><?php echo $kabkot; ?></td>
                      <td><?php echo $provinsi; ?></td>
                      <td><?php echo $status; ?></td>
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
