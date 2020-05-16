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
          <a class="btn btn-primary" href="<?php echo base_url();?>akun/rekap_btm" type="button" style="margin:5px"> << Kembali</a>
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
       $('#sebuah-tabelbtm').DataTable({"scrollX": true,  "order": [[ 3, "asc" ], [0,"asc"]]});
       $('.dataTables_length').addClass('bs-select');
     });
</script>