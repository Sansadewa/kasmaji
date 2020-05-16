<head>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes"> -->
  <title>Profile Panel Sipaju</title>

  <!-- plugins:css -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css">
  <!-- endinject -->

  <link rel="shortcut icon" href="<?php echo base_url();?>/public/images/favicon.png" />
</head>
<body>
        <div style="margin :5%">
          <a class="btn btn-primary" href="<?php echo base_url();?>akun/topik" type="button" style="margin:5px"> << Kembali</a>
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
        </body>
        <!-- plugins:js -->
  <script src="<?php echo base_url();?>/public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>/public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>/public/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>/public/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>/public/js/dashboard.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#sebuah-tabel').DataTable({"scrollX": true});
      $('.dataTables_length').addClass('bs-select');
    });
</script>